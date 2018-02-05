<?php

/**
 * Class Node 链表节点
 */
class Node
{
    public $data;
    public $next;

    public function __construct($id, $data = NULL)
    {
        $this->id = $id;
        $this->data = $data;
        $this->next = NULL;
    }
}

/**
 * Class SingleLinkedList 单链表
 */
class SingleLinkedList
{
    private $header;
    private $position;
    private $current;

    public function __construct()
    {
        $this->header = NULL;
        $this->position = 0;
        $this->current = NULL;
    }

    public function insert(Node $node)
    {
        if($this->header === NULL) {
            $this->header = &$node;
            $this->current = $this->header;
        }else{
            $this->current->next = $node;
            $this->current = &$node;

        }
    }

    public function next()
    {
        if ($this->current === NULL){
            $this->current = $this->header;
        }else{
            $this->current = $this->current->next;
        }
        return $this->current;
    }

    public function reset()
    {
        $this->current = null;
    }

    public function find($id)
    {
        while ($node = $this->next()){
            if($node->id == $id)
                return $node;
        }
    }

    public function delete($id)
    {
        while ($node = $this->next()){
            if($node->id == $id){
                $this->current->next = $this->current->next->next;
                return $this;
            }
        }
    }

}

$singleLinkeList = new SingleLinkedList();
for ($i=0; $i < 5; $i++){
    $n = new Node($i,$i+1);
//    var_dump($n);
    $singleLinkeList->insert($n);
}
$singleLinkeList->reset();

//print list
echo '##########print list############';
echo PHP_EOL;
do{
    $node = $singleLinkeList->next();
    print_r($node->data);
    echo "-------------------------------";
    echo PHP_EOL;
}
while ($node = $node->next);

// find some node
echo '##########find some node############';
echo PHP_EOL;
$singleLinkeList->reset();
$node = $singleLinkeList->find(2);
echo $node->data;
echo "-------------------------------";
echo PHP_EOL;

$singleLinkeList->reset();

// delete some node;
echo '##########delete some node############';
echo PHP_EOL;
$singleLinkeList->reset();
$singleLinkeList->delete(2);
$singleLinkeList->reset();
do{
    $node = $singleLinkeList->next();
    print_r($node->data);
    echo "-------------------------------";
    echo PHP_EOL;
}
while ($node = $node->next);


?>
