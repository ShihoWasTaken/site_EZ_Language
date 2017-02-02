 var $collectionHolder;


jQuery(document).ready(function() {

    function addArgumentForm($collectionHolder, $newLinkLi) {
        // Get the data-prototype explained earlier
        var prototype = $collectionHolder.data('prototype');

        // get the new index
        var index = $collectionHolder.data('index');

        // Replace '__name__' in the prototype's HTML to
        // instead be a number based on how many items we have
        var newForm = prototype.replace(/__name__/g, index)
                               .replace(/__name__label__/g, "Bonjour");

        // increase the index with one for the next item
        $collectionHolder.data('index', index + 1);

        // Display the form in the page in an li, before the "Add a tag" link li
        $collectionHolder.append($newLinkLi.append(newForm));
    }

    function addTagFormDeleteLink($tagFormLi) {
        var $removeFormA = $('<a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>');
        $tagFormLi.prepend($removeFormA);

        $removeFormA.on('click', function(e) {
            // prevent the link from creating a "#" on the URL
            e.preventDefault();

            // remove the li for the tag form
            $tagFormLi.remove();
        });
    }

    // Get the ul that holds the collection of arguments
    $collectionHolder = $('ul.arguments');

    $collectionHolder.find('li').each(function() {
        addTagFormDeleteLink($(this));
    });


    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $('#add_argument_link').on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // setup an "add a argument" link
        var $newLinkLi = $('<li></li>');

        // add a new argument form (see next code block)
        addArgumentForm($collectionHolder, $newLinkLi);
        addTagFormDeleteLink($newLinkLi);
    });
});
