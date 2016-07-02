pyrocms-mailchimp
=================

MailChimp integration for PyroCMS

Developt by: @centerax https://github.com/centerax


Translate in
=================
- English @centerax,
- Italian @ChristianGiupponi and
- French @mamarmite

pyro-list-field
===============

A List field type for PyroCMS

![Screen Shot 2013-02-13 at 2 28 35 PM](https://f.cloud.github.com/assets/1425304/154199/ad9fa5f4-7613-11e2-8cdc-72507b9b28d1.png)

Features
--------

* Generates an array of items to be pushed into a list of any kind
* Has enter mapped to the submit item
* Remove items easily

Usage
-----

This plugin stores 2 things, a key(the index of the item) and the value(value of the input).

``` html
<ul>
{{ my_field_slug }}
  <li class="item{{ key }}">{{ value }}</li>
{{ /my_field_slug }}
</ul>
```

If there was 3 items, this would output:

``` html
<ul>
  <li class="item0">Item String Value</li>
  <li class="item1">Item String Value</li>
  <li class="item2">Item String Value</li>
</ul>
```

To Do
-----

* Add sorting/ordering
* Allow child list items
* List to string instead of just array
* Allow styling/classes/odd and even
* Allow links (url, target, title etc.)
* Allow setting of key (index or string etc.)
