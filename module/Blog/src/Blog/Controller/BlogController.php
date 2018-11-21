<?php


namespace Blog\Controller;


use Blog\Model\Category;
use Doctrine\ORM\EntityManager;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class BlogController extends AbstractActionController
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * BlogController constructor.
     * @param EntityManager $em
     */
    public function __construct($em)
    {
        $this->em = $em;
    }

    public function indexAction()
    {
        $categories = $this->em->getRepository(Category::class)->findAll();
        return new ViewModel([
            'categories' => $categories
        ]);
    }


}