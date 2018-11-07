// ### UW Search

// This function creates a UW Search
// For usage please refer to the [UW Web Components Search](http://uw.edu/brand/web/#search)

UW.Search = Backbone.View.extend({

  // These are the three search options: the UW, the current site
  searchFeatures : {
    uw        : 'uw',
    site      : 'site'
  },

  // This is the HTML for the search bar that is preprended to the body tag.
  searchbar :
               '<div class="container no-height">'+
                  '<div class="center-block uw-search-wrapper">'+
                    '<form class="uw-search" action="<%= UW.baseUrl %>">'+
                      '<label class="screen-reader" for="uw-search-bar">Enter search text</label>' +
                      '<input id="uw-search-bar" type="search" name="s" value="" autocomplete="off" />'+
                    '</form>'+

                    '<select id="mobile-search-select" class="visible-xs">' +
                      '<option value="uw" >All the UW</option>' +
                      '<option value="site" selected>Current site</option>' +
                    '</select>' +

                    '<input type="submit" value="search" class="search" tabindex="-1"/>'+

                    '<div class="labels hidden-xs" style="display:none;">'+
                    //  '<label class="radio">'+
                     //   '<input type="radio" name="search" value="uw" data-toggle="radio"  />'+
                     //   'All the UW'+
                     // '</label>'+

                      '<label class="radio">'+
                        '<input type="radio" name="search" value="site" data-toggle="radio" checked />'+
                        'Current site'+
                      '</label>'+

                '</div>'+
              '</div>',

  // Default values
  defaults : {},

  // List of events
  // Toggling the radio buttons changes the function of the search bar from searching the UW and searching the current site
  events :
  {
    'click label.radio' : 'toggleSearchFeature',
    'change select' : 'toggleSearchFeature',
    'click .search' : 'submitForm',
    'submit form' : 'submitSearch',
    // Accessibility events
    'keydown' : 'handleKeyDown',
    'focus input' : 'skipToContentIfHidden'
  },


  // Initialize the view and bind events
  initialize :function ( options )
  {
    this.settings = _.extend( {}, this.defaults , this.$el.data() , options )

    this.render()

    this.toggle = new UW.SearchToggle()

    this.toggle.on( 'open', this.toggleBlur, this )

    this.searchFeature = this.$el.find(':radio:checked').val()
  },

  // Render the search bar above the `body` element and set the view element to the search bar HTML
  // since most events take place within that view.
  render : function()
  {
    this.$el.html( _.template( this.searchbar, this.settings ))
  },

  // todo: cleanup this function
  toggleBlur: function()
  {
    if ( this.toggle.settings.isOpen ) {
        this.$el.find( '#uw-search-bar' ).focus();
        this.$el.attr( 'aria-hidden', 'false' ).attr( 'role', 'search' );
    } else {
        this.$el.attr( 'aria-hidden', 'true' ).removeAttr( 'role' );
    }
  },

  handleKeyDown: function(event)
  {
    switch ( event.keyCode )
    {

      case UW.KEYCODES.ESC :
        event.stopPropagation()
        this.toggle.toggleSearchBar()
        this.toggle.$el.focus()
        return false

      default :
        return true

    }
  },

  // Set a property to the current radio button indicating which function the search bar is providing.
  // todo: clean up
  toggleSearchFeature : function( event )
  {
    var value = $( event.currentTarget ).find( 'input' ).val()
    this.searchFeature = value
  },

  // Skip the search if it is hidden when tabbing through
  skipToContentIfHidden: function() {
    if ( ! this.toggle.settings.isOpen ) $('#main-content').focus()
  },

  // Determine if the client wants to search current site or the entire UW
  submitSearch : function( e )
  {
    switch ( this.searchFeature )
    {
      case this.searchFeatures.uw :
        this.$el.find( 'input' ).attr( 'name', 'q' )
        this.$el.find( 'form' ).attr( 'action', Backbone.history.location.protocol + '//uw.edu/search/' )
        return true;

      case this.searchFeatures.site :
	  this.$el.find('input' ).attr( 'name', 'q' )
	  this.$el.find('form').attr('action','https://sodalum.uw.edu/wp-content/themes/uwsodalum-2014/search.php/')
        return true;

      default:
        return false;
    }
  },

  submitForm : function()
  {
    this.$el.find('form').submit()
    return false;
  }

})
