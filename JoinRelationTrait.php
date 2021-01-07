<?php

namespace denis909\yii;

trait JoinRelationTrait
{

    public function joinRelation(string $name, $key = null)
    {
        $found = false;

        foreach($this->joinWith as $config)
        {
            list($with, $eagerLoading, $joinType) = $config;

            if (array_key_exists($key ?? $name, $with))
            {
                $found = true;

                break;
            }
        }

        if ($found)
        {
            return $this;
        }

        if ($key)
        {
            $name .= ' ' . $key;
        }

        return $this->joinWith($name);
    }

}