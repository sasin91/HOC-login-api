<?php

namespace Tests\Feature;

trait AssertsModelLink
{
    protected function assertValidLink($link, $model)
    {
        $model = is_array($model) ? $model : $model->toArray();

        $this->assertArrayHasKey($link, $model['links'], "Model did not contain link [{$link}].");
        $this->assertNotEmpty($model['links'][$link], "Model did contain link [{$link}], but it has no url value.");

        $this->assertNotFalse(filter_var($model['links'][$link], FILTER_VALIDATE_URL), "[{$model['links'][$link]}] is not a valid URL.");
    }
}
