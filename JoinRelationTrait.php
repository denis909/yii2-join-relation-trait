<?php

namespace denis909\yii;

trait JoinRelationTrait
{

    protected $_joinRelation = [];

    public function joinRelation(string $name, $key = null)
    {
        if (array_search($key ?? $name, $this->_joinRelation) !== false)
        {
            return $this;
        }

        $this->_joinRelation[] = $key ?? $name;

        if ($key)
        {
            $name .= ' ' . $key;
        }

        return $this->joinWith($name);
    }

}