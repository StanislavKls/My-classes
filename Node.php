<?php
namespace App;

class Node
{
    private $key;
    private $left;
    private $right;

    public function __construct($key = null, $left = null, $right = null)
    {
        $this->key   = $key;
        $this->left  = $left;
        $this->right = $right;
    }
    public function getKey() //геттер возвращающий ключ
    {
        return $this->key;
    }
    public function getLeft() //геттер возвращающий левое значение узла
    {
        return $this->left;
    }
    public function getRight() //геттер возвращающий правое значение узла
    {
        return $this->right;
    }
    public function search($key) //поиск ключа, возврат узла есть есть, иначе null
    {
        if ($key === $this->key) {
            return $this;
        }
        if ($this->key > $key && $this->left !== null) {
            return $this->left->search($key);
        } elseif ($this->key < $key && $this->right !== null) {
            return $this->right->search($key);
        }
        return null;
    }
    public function insert($key) //вставляет новый узел, если 
    {
        if ($this->key === $key) {
            return null;
        }
        if ($this->key === null) {
            $this->key = $key;
        } elseif ($this->right === null and $this->key < $key) {
            $this->right = new Node($key);
        } elseif  ($this->right !== null and $this->key < $key) {
            $this->right->insert($key);
        } elseif ($this->left === null and $this->key > $key) {
            $this->left = new Node($key);
        } else {
            $this->left->insert($key);
        }
    }
    private function getValues() //собирает все значения дерева, возвращает массив
    {
        if ($this->key === null) {
            return null;
        }
        $result[] = $this->key;
        if ($this->left !== null) {
            $result = array_merge($result, $this->left->getValues());
        }
        if ($this->right !== null) {
            $result = array_merge($result, $this->right->getValues());
        }
        return $result;
    }
    public function getCount() //возвращает количество узлов в дереве
    {
        return count($this->getValues());
    }
    public function getSum() //возвращает сумму всех ключей дерева
    {
        return array_sum($this->getValues());
    }
    public function toArray() //возвращает одномерный массив содержащий все ключи
    {
        return $this->getValues();
    }
    public function toString() //возвращает строковое представление дерева
    {
        return "(" . implode(", ", $this->getValues()) . ")";
    }
    public function every($fn) //проверяет, удовлетворяют ли все ключи дерева условию, заданному в передаваемой функции
    {
        foreach($this->getValues() as $item) {
            if ($fn($item) === false) {
                return false;
            }
        }
        return true;
    }
    public function some($fn) //проверяет, удовлетворяет ли какой-либо ключ дерева условию, заданному в передаваемой функции.
    {
        foreach($this->getValues() as $item) {
            if ($fn($item) === true) {
                return true;
            }
        }
        return false;
    }
    private function countSide($node) //считает количество узлов в левой ветке
    {
        if ($node->key === null) {
            return null;
        }

        $left[] = 1;
        if ($node->left !== null) {
            $left = array_merge($left, $node->left->countSide($node->left));
        }
        if ($node->right !== null) {
            $left = array_merge($left, $node->right->countSide($node->right));
        }
        return $left;
    }

    private function checkBalance($node) //проверяет разницу количества правого и левого узла
    {
        $countR = 0;
        $countL = 0;
        if ($node->right !== null) {
            $countR = count($node->countSide($node->right));
        }
        if ($node->left !== null) {
            $countL = count($node->countSide($node->left));
        }
        return abs($countL - $countR) < 3;
    }
    public function isBalanced()
    {
        if ($this->key === null) {
            return null;
        }
        $result[] = $this->checkBalance($this);
        if ($this->left !== null) {
            $result[] = $this->left->checkBalance($this->left);
        }
        if ($this->right !== null) {
            $result[] = $this->right->checkBalance($this->right);
        }
        $result = in_array(false, $result) ? false : true;
        return $result;
    }
}