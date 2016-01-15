<?php

namespace IdeaPool\Entity;

class Idea
{
    protected $_id = null;
    protected $_name = null;
    protected $_vote_count = null;
    protected $_description = null;

    public function __construct(array $data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, '_' . $key)) {
                $this->{'_' . $key} = $value;
            }
        }
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function getVoteCount()
    {
        return $this->_vote_count;
    }

    public function getDescription()
    {
        return $this->_description;
    }
}