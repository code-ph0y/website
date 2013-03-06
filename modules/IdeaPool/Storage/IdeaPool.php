<?php
namespace IdeaPool\Storage;

use IdeaPool\Storage\Base as BaseStorage;
use IdeaPool\Entity\Idea as IdeaEntity;

class IdeaPool extends BaseStorage
{
    protected $_meta = array(
        'conn'    => 'main',
        'table'   => 'idea_pool',
        'primary' => 'id',
        'fetchMode' => \PDO::FETCH_ASSOC
    );

    //name is whats going to be displayed in error messages
    //entity is the entities namespace
    protected $_storage_params = array(
        'name'=>'idea pool',
        'entity'=>''
    );

    /**
     * Find a booking record by its ID
     *
     * @param $bookingID
     * @return mixed
     */
    public function findByID($id)
    {
        return $this->find($id);
    }

    /**
     * Get a entity by its id
     *
     * @param $id
     * @return mixed
     * @throws \Exception
     */

    public function getByID($id)
    {
        $row = $this->find((int)$id);
        if ($row === false) {
            throw new \Exception('Unable to obtain booking row for id: ' . $id);
        }

        return new IdeaEntity($row);
    }

    /**
     * Create a record
     *
     * @param  array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->insert($data);
    }

    /**
     * Get entity objects from all rows
     *
     * @return array
     */
    public function getAll()
    {
        $entities = array();
        $rows = $this->createQueryBuilder()
            ->select('i.*')
            ->from($this->getTableName(), 'i')
            ->orderBy('i.vote_count','DESC')
            ->execute()
            ->fetchAll($this->getFetchMode());

        foreach ($rows as $row) {
            $entities[] = new IdeaEntity($row);
        }

        return $entities;
    }

    /**
     * Delete a user by their id
     *
     * @param  int $id
     * @return mixed
     */
    public function deleteById($id)
    {
        return $this->delete(array('id' => (int)$id));
    }

    /**
     * Vote up
     *
     * @param int $ideaId
     * @return void
     *
     */
    public function voteUp($ideaId) {
        $idea = $this->getByID($ideaId);
        $num = $idea->getVoteCount();
        $num++;
        $this->update(array(
            'vote_count'=>$num
        ), array(
            'id'=>$ideaId
        ));
    }

    /**
     * Vote down
     *
     * @param int $ideaId
     * @return void
     *
     */
    public function voteDown($ideaId) {
        $idea = $this->getByID($ideaId);
        $num = $idea->getVoteCount();
        $num--;
        $this->update(array(
            'vote_count'=>$num
        ), array(
            'id'=>$ideaId
        ));
    }

    public function filter($filter, $value) {
        /*        switch($filter) {
                    case 'search':
                        $entities = array();
                        $rows = $this->_conn->createQueryBuilder()
                            ->select('*')
                            ->from($this->getTableName(), 'e')
                            ->orWhere("e.first_name LIKE '%" . $value . "%'")
                            ->orWhere("e.surname LIKE '%" . $value . "%'")
                            ->orWhere("e.start_date_time LIKE '%" . $value . "%'")
                            ->execute()
                            ->fetchAll();
                        //->fetch($this->getFetchMode());

                        foreach ($rows as $row) {
                            $entities[] = new BookingEntity($row);
                        }
                        return $entities;
                        break;
                    default:
                        throw new \Exception('Field not supported');
                        break;
                }
        */
    }
}