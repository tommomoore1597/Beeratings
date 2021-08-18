<?php

//Blog post Validation 

function validatePost($post)
{


    $errors = array();
    
    if (empty($post['title'])){
        array_push($errors, 'Post title is Required');
    }
  
    if (empty($post['body'])){
        array_push($errors, 'Body is Required');
    }
  

    $existingPost = selectOne('blog', ['title' => $post['title']]);
    if ($existingPost) {
        if(isset($post['update-post']) && $existingPost['id'] != $post['id'])  {
            array_push($errors, 'Post with that title already exists');
        } 
        
        if(isset($post['add-post'])){
            array_push($errors, 'Post with that title already exists');
        }
    }

    return $errors;
}
