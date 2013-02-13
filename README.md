pyro-list-field
===============

A List field type for PyroCMS

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
* List to string instead of just array
* Allow styling
* Allow links (url, target, title etc.)
* Allow setting of key (index or string etc.)


(The MIT License)

Copyright (c) 2013 James Doyle <james2doyle@gmail.com>

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
'Software'), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.