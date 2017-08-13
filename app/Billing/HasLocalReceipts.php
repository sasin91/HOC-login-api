<?php

namespace App\Billing;

/**
 * Trait HasLocalReceipts
 *
 * @package \App\Billing
 */
trait HasLocalReceipts
{
    /**
     * Get a collection of the entity's receipts.
     *
     * @param array $parameters
     *
     * @return mixed
     */
    public function receipts($parameters = [])
    {
        return $this->localReceipts()
            ->when(!empty($parameters), function ($query) use ($parameters) {
                return $query->where($parameters);
            })
            ->get();
    }

    /**
     * @return \Illuminate\Database\Query\Builder
     */
    protected function localReceipts()
    {
        return $this->user()->receipts()->where('provider_id', 'regexp', "^[{$this->providerId()}].*$");
    }

    /**
     * Find a receipt by ID.
     *
     * @param string $id
     *
     * @return mixed
     */
    public function findReceipt($id)
    {
        return $this->localReceipts()->find($id);
    }
}
