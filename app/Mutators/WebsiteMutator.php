<?php

namespace App\Mutators;

trait WebsiteMutator
{

    /**
     * Get the post title.
     *
     * @param string $value
     * @return string
     */
    public function getUuidAttribute($value)
    {
        return (string)$value;
    }

    /**
     * Set the post title.
     *
     * @param string $value
     */
    public function setUuidAttribute($value)
    {
        $this->attributes['uuid'] = (string)$value;
    }

    /**
     * Get the post title.
     *
     * @param string $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        return (string)$value;
    }

    /**
     * Set the post title.
     *
     * @param string $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = (string)$value;
    }

    /**
     * Get the post title.
     *
     * @param string $value
     * @return string
     */
    public function getDescriptionAttribute($value)
    {
        return (string)$value;
    }

    /**
     * Set the post title.
     *
     * @param string $value
     */
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = (string)$value;
    }
}