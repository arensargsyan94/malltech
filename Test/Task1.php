<?php

/**
 * Задача 1.
 * Class Library
 */
class Library {
    private $_author;
    private $_book;

    /**
     * Library constructor.
     * @param null $author
     * @param null $book
     */
    public function __construct($author = null, $book = null) {
        $this->_author = $author;
        $this->_book = $book;
    }

    /**
     * Get Author
     * @return null
     */
    public function getAuthor() {
        return $this->_author;
    }

    /**
     * Set Author
     * @return null
     */
    public function setAuthor($author = null) {
        $this->_author = $author;
    }

    /**
     * Get Book
     * @return null
     */
    public function getBook() {
        return $this->_book;
    }

    /**
     * Set Book
     * @return null
     */
    public function setBook($book = null) {
        $this->_book = $book;
    }

    /**
     * Create new Article record
     */
    public function createArticle() {
        try {
            DB::createArticle();// DB - class to connect to database
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * Get Author by book name
     * @param $bookId
     */
    public function getAuthorByBook($bookId) {
        try {
            DB::getAuthorByBook($bookId);// DB - class to connect to database
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * get All Articles by author name
     * @param $authorId
     */
    public function getAllArticlesByAuthor($authorId) {
        try {
            DB::getAllArticlesByAuthor($authorId);// DB - class to connect to database
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * Edit Book Author
     * @param $bookId
     * @param $newAuthorId
     */
    public function editAuthor($bookId, $newAuthorId) {
        try {
            DB::editAuthor($bookId, $newAuthorId);// DB - class to connect to database
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}