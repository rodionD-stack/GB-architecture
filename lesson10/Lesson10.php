<?php

class BinaryTreeElement {
    public $value;
    public $left;
    public $right;

    public function __construct ($itemValue) {
      $this->value = $itemValue;
      $this->left = null;
      $this->right = null;
    }
  }
  
  class BinaryTree {
    public $message;
    public $root;

    public function __construct() {
      $this->root = null;
      $this->message = 'Elemnt here';
    }
  
    public function insertItem ($newItem) {
       $newNode = new BinaryTreeElement($newItem);
      
      if ($this->root === null) {
        $this->root = $newNode;
        return;
      }

      $this->insertItem($this->root, $newNode);
    }
  
    public function insertItem2 ($currentNode, $newNode) {
      
      if ($newNode['value'] < $currentNode['value']) {
        if ($currentNode['left'] === null) {
          $currentNode['left'] = $newNode;
        } else {
          $this->insertItem2($currentNode['left'], $newNode);
        }
      }
  
      if ($newNode['value'] > $currentNode['value']) {
        if ($currentNode['right'] === null) {
          $currentNode['right'] = $newNode;
        } else {
          $this->insertItem2($currentNode['right'], $newNode);
        }
      }
      
      if ($newNode['value'] === $currentNode['value']) {
        echo $this->message;
      }
    }

    public function down ($handlerFunc) {
        $this->downOrder($this->root, $handlerFunc);
    }
    
    public function downOrder ($currentNode, $handlerFunc) {
        if ($currentNode === null) return;
        $this->downOrder($currentNode['left'], $handlerFunc);
        $handlerFunc($currentNode['value']);
        $this->downOrder($currentNode['right'], $handlerFunc);
    
    }
}
  
$binaryTree = new BinaryTree();
  
$binaryTree->insertItem(3);
$binaryTree->insertItem(5);
$binaryTree->insertItem(7);
$binaryTree->insertItem(1);
$binaryTree->insertItem(4);
$binaryTree->insertItem(8);
