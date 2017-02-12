<?php

namespace AppBundle\Tests\Controller;

class CategoryControllerTest extends CustomWebTestCase
{
    /* La création des Catégories doivent être accessible uniquement par l'admin
    *  On teste donc la route avec les droits d'admin
    */
    public function testThatCategoryCreateIsSuccessful()
    {
        $this->checkThatAdminPageIsSuccessful('/admin/category');
    }
}
