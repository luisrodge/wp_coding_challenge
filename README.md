# Wordpress Coding Challenge

The wordpress coding challenge theme is a theme geared towards sufficing the requirements provided by @aram356.


## Architecture Overview

Since one of the requirements was to not use any third party utilities, all sections, and their auxiliary components were structured in a systematic nature to make the usage of the custom theme more predictable. 

This means that any content that the user can edit will need to be assigned a number of metadata for it to work

Sections, stories, and ads all require existing metadata and supplementary data in order to function properly. This can be either of the following:

Type | Description
------------- | -------------
Tag  | This is used to properly define the location of ad units. i.e `Top Sidebar`, `Right Sidebar`, etc.
Category  | This is used to define which section/page stories and ads should be displayed in. i.e. `Section 1`, `Section 2`, etc.
Post Type | This is used to more easily organize `Ads` and `Stories` within their own catalogs in the admin panel of wordpress. 

Using the aforementioned, an admin can easily manage (CRUD) stories, ads, and headlines for different sections. 

This entire architecture is achieved by leveraging only existing WordPress APIs such as posts, custom post types, categories, and tags. 

## Deficiencies

The downsides of this approach are quite obvious, but the main one is that the underlying components of this architecture have to be tightly coupled in order for it to function as a single unit (theme).

Consider the following weaknesses:

* If I created a new story post but forgot to assign it to its appropriate category it will therefore not be displayed. 
* If I created a new ad but forgot to assign it with its appropriate tags, it may appear in the wrong location or it may cease to appear at all.
* After a fresh installation, I have to manually create each dependency tag, i.e. `Top Sidebar`, before I can start creating ads. 

As you can see the current architecture makes it rather easy to make mistakes and since x depends on y one mistake can cause the entire unit to fail. 

## Run Locally

Before running locally, you need to have a web server solution installed on your computer. Refer to one of the following to learn how to install the appropriate web server software depending on your OS:

* Windows - [XAMPP](https://www.apachefriends.org/index.html)
* Mac- [MAMP](https://www.mamp.info/en/)

Once you have your web server running you then need to install WordPress. Depending on your OS the steps may slightly differ.  Refer to one of the following guides to learn how to install WordPress depending on your OS:

* [Installing Wordpress On Windows ](https://themeisle.com/blog/install-xampp-and-wordpress-locally/)
* [Installing Wordpress On Mac](https://skillcrush.com/2015/04/14/install-wordpress-mac/)

Now you need to install the theme within your WordPress installation directory. To do so navigate to where your WordPress installation is being served, and then clone this repo in the root of the `themes` directory.

For my machine, this location is set to the following:

`C:\xampp\htdocs\wpsite\wp-content\themes`

Once installed you have to activate the `Coding Challenge Theme` within the wordpress admin panel, Appearance > Themes.

Once the theme is activated, you need to create a couple of categories to act as sections. Next, you must create a Top Menu and assign the categories to it.

