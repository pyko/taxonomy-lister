Bolt Taxonomy Lister
======================

A Bolt extension that will return a set of specified taxonomy given a list of records.

Quick start
-------

To use, simply pass in an array of records: `{{ listtaxonomies(records) }}`

By default, the extension will look for the `tags` taxonomy, but this can be overriden by providing the custom taxonomy as a second argument.


Advanced usage
-------
`listtaxanomies` can take two arguments.

The first argument is required, and is the list of records you are interested in.

The second argument is optional. It allows you to specify the taxonomy to list (use the plural slug). By default it filters for the 'tags' taxonomy.

Example
-------
Imagine you have a custom contenttype of `books` that has `tags` as well as a custom taxonomy of `genres`

    {% setcontent books = 'books' %}
    {# Assume 'books' is array of 3 elements #}
    {# book 1 - tags: fiction, easy, recommended     | genres: comedy, fantasy #}
    {# book 2 - tags: fiction, magic                 | genres: fantasy, sci-fi #}
    {# book 3 - tags: non-fiction, heavy, recommended| genres: psychology #}
 
    {{ listtaxonomies(books) }}
    {# Returns: ['easy', 'fiction', 'heavy', 'non-fiction', 'recommended'] #}
 
    {{ listtaxonomies(books, 'genres') }}
    {# Returns: ['comedy', 'fantasy', 'psychology', 'sci-fi'] #}
 
    {# Example usage #}
    <ul>
    {% for genre in listtaxonomies(books, 'genres') %}
       <li>{{ genre }}</li>
    {% endfor %}
    </ul>