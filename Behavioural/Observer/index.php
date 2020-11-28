<?php

//Subscriber
interface Subscriber {
    public function update($postId);
}

//Publisher
class HealthyMe {

    private $subscriber = array();
    private $post;

    public function registerSubscriber(Subscriber $subs) {
        $this->subscribers[] = $subs;
        echo "Subscriber Added\n";
    }

    public function notifySubscribers() {
        foreach($this->subscribers as $subscriber) {
            $subscriber->update($this->post);
        }
    }
    
    public function publishPost($post) {
        $this->post= $post;
        $this->notifySubscribers();
    }
}

//Concrete subscriber
class FoodUpdateSubscribers implements Subscriber {

    public function update($postId) {
        echo "New Post with ID $postId Published \n";
    }
}

$publisher = new HealthyMe();
$subscriber = new FoodUpdateSubscribers();

$publisher->registerSubscriber($subscriber);
$publisher->publishPost(12);