<?php


namespace App\Controller;



use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class BaseController extends AbstractController
{

    public static function getSubscribedServices() {
        return array_merge(parent::getSubscribedServices(), [ 'jms_serializer' => '?'.SerializerInterface::class, ]);
    }

    /**
     * @param $data
     * @return mixed
     */
    protected function serialize($data)
    {
        return $this->container->get('jms_serializer')
            ->serialize($data, 'json');
    }

    /**
     * @param $object
     * @param $class
     * @return mixed
     */
    protected function deserialize($object, $class)
    {
        return $this->container->get('jms_serializer')
            ->deserialize($object, $class, 'json');
    }
}


