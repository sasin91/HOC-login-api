<?php

namespace App\Billing;

/**
 * Trait HasLocalInvoices
 *
 * @package \App\Billing
 */
trait HasLocalInvoices
{
    /**
     * Get a collection of the entity's invoices.
     *
     * @param  bool  $includePending
     * @param  array $parameters
     *
     * @return \Illuminate\Support\Collection
     */
    public function invoices($includePending = false, $parameters = [])
    {
        return $this->localInvoices()
            ->when(!empty($parameters), function ($query) use ($parameters) {
                return $query->where($parameters);
            })
            ->get();
    }

    /**
     * @return \Illuminate\Database\Query\Builder
     */
    protected function localInvoices()
    {
        return $this->user()->localInvoices()->where('provider_id', 'regexp', "^[{$this->providerId()}].*$");
    }

    /**
     * Find an invoice by ID.
     *
     * @param  string $id
     *
     * @return object|null
     */
    public function findInvoice($id)
    {
        return $this->localInvoices()->find($id);
    }
}
