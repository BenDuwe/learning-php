# Challenge: Data sharing between Front- & Back - end

|Challenge Parameters  |Challenge Details              |
|:---------------------|:------------------------------|
|Repository Folder     |`2.data-sharing`               |
|Challenge type        |`learning challenge`           |
|Duration              |`~2 days`                      |
|Deadline              |`20/08/2019 8h59`              |
|Deployment method     |`N/A`                          |
|Group composition     |`solo --help each other`       |

## Introduction
Everything you can access from your browser is `Client side`,<br/>
everything you can't access from the browser, that has access to the server's resources is `Server side`. 

Both sides are also known as `Front end` and `Back end`. 

## Exercises
`Front end` and `Back end` need to be able to transfer information to one another.
Otherwise how would you make a login system (for example), there are thousands of scenario's
in which we need to share information from one end to the other.

Let's take a look at some of the various ways we know to do this... 


### Exercise 1:
- Create a file, called `post.php`
- In it create an HTML form and give it the `method` post
- Add an input field called username
- Add a submit button
- Give the form an `action` of `""`
- Now, when you type a username in the field and submit it, php should display: `Welcome, $username` on the page

> Hint: Look up $_POST (and superglobals)


### Exercise 2:
- Create a file, called `get.php`
- Create a table or copy one from [CodePen](https://codepen.io/nikhil8krishnan/pen/WvYPvv)
- Create an HTML form and give it the `method` get
- Add an input field called rownumbers, give it a `type` of number
- Add a submit button
- Give the form an `action` of `""`
- Now, when you choose a number in the input field, the table should only show that number of rows
- The rows can all have the same content

> Hint: You want to use a loop & look up $_GET (and superglobals)


### Exercise 3: 
- Create a file, called `cookie.php`
- Create a textarea in it
- Use javascript so that, when you write a joke (or a message) in it, it gets saved in a cookie
- Now, when you load the page, use `PHP` to check if the cookie exists and if it does, 
then print the joke (or message) on the page

> Hint: Look up cookies for javascript and `$_COOKIE` for php

 
## Goals
- [ ] Understand what `SUPERGLOBALS` are. 
- [ ] Understand how forms work.
- [ ] Learn about `$_COOKIE`, `$_POST`, `$_GET`, understand their differences.
- [ ] Learn to interact between Javascript & PHP.
- [ ] Understand what `method` and `action` do on form elements.
