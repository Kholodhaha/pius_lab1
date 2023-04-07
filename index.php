<?php

require 'vendor/autoload.php';

use App\Comment;
use App\User;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Validation;

// Task_1
echo 'Task_1</br>';

$validator = Validation::createValidator();
$violations = [];

$users[] = new User(1, "Us1", "qwerty1@gmail.com", "password1");
$users[] = new User(2, "Us2", "qwerty2@gmail.com", "password2");
$users[] = new User(3, "Us3", "qwerty3@gmail.com", "password3");
$users[] = new User(4, "Us4", "qwerty4@gmail.com", "password4");
$users[] = new User(5, "Us5", "qwerty5@gmail.com", "password5");

foreach($users as $user) {
	echo 'ID_' . $user->id . ' : name_' . $user->name . '</br>';

	$violations[] = $validator->validate($user->id, [
		new Positive(),
		
	]);

	$violations[] = $validator->validate($user->name, [
		new NotBlank(),
		new NotNull(),
		new Length(['min' => 2, 'max' => 30])
	]);

	$violations[] = $validator->validate($user->password, [
		new NotBlank(),
		new NotNull(),
		new Length(['min' => 6, 'max' => 40])
	]);
}

if (0 !== count($violations)) {
    foreach ($violations as $items) {
		foreach($items as $violation) {
			echo $violation->getMessage() . '</br>';
		}
    }
}

// Task_2
$messages[] = "message 11";
$messages[] = "message 22";
$messages[] = "message 33";
$messages[] = "message 44";
$messages[] = "message 55";

$comments = [];
for($i = 0; $i < count($messages); $i++) {
	$comments[] = new Comment($users[$i], $messages[$i]);
}

$datetime = new DateTime('2020-11-11 11:11:11');
foreach($comments as $comment) {
	if($comment->user->createdOn > $datetime) {
		echo $user->getCreatedOn() . '</br>';
		
	}
}