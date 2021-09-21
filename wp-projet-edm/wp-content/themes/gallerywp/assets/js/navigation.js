/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
    var gallerywp_secondary_container, gallerywp_secondary_button, gallerywp_secondary_menu, gallerywp_secondary_links, gallerywp_secondary_i, gallerywp_secondary_len;

    gallerywp_secondary_container = document.getElementById( 'gallerywp-secondary-navigation' );
    if ( ! gallerywp_secondary_container ) {
        return;
    }

    gallerywp_secondary_button = gallerywp_secondary_container.getElementsByTagName( 'button' )[0];
    if ( 'undefined' === typeof gallerywp_secondary_button ) {
        return;
    }

    gallerywp_secondary_menu = gallerywp_secondary_container.getElementsByTagName( 'ul' )[0];

    // Hide menu toggle button if menu is empty and return early.
    if ( 'undefined' === typeof gallerywp_secondary_menu ) {
        gallerywp_secondary_button.style.display = 'none';
        return;
    }

    gallerywp_secondary_menu.setAttribute( 'aria-expanded', 'false' );
    if ( -1 === gallerywp_secondary_menu.className.indexOf( 'nav-menu' ) ) {
        gallerywp_secondary_menu.className += ' nav-menu';
    }

    gallerywp_secondary_button.onclick = function() {
        if ( -1 !== gallerywp_secondary_container.className.indexOf( 'gallerywp-toggled' ) ) {
            gallerywp_secondary_container.className = gallerywp_secondary_container.className.replace( ' gallerywp-toggled', '' );
            gallerywp_secondary_button.setAttribute( 'aria-expanded', 'false' );
            gallerywp_secondary_menu.setAttribute( 'aria-expanded', 'false' );
        } else {
            gallerywp_secondary_container.className += ' gallerywp-toggled';
            gallerywp_secondary_button.setAttribute( 'aria-expanded', 'true' );
            gallerywp_secondary_menu.setAttribute( 'aria-expanded', 'true' );
        }
    };

    // Get all the link elements within the menu.
    gallerywp_secondary_links    = gallerywp_secondary_menu.getElementsByTagName( 'a' );

    // Each time a menu link is focused or blurred, toggle focus.
    for ( gallerywp_secondary_i = 0, gallerywp_secondary_len = gallerywp_secondary_links.length; gallerywp_secondary_i < gallerywp_secondary_len; gallerywp_secondary_i++ ) {
        gallerywp_secondary_links[gallerywp_secondary_i].addEventListener( 'focus', gallerywp_secondary_toggleFocus, true );
        gallerywp_secondary_links[gallerywp_secondary_i].addEventListener( 'blur', gallerywp_secondary_toggleFocus, true );
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function gallerywp_secondary_toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'gallerywp-focus' ) ) {
                    self.className = self.className.replace( ' gallerywp-focus', '' );
                } else {
                    self.className += ' gallerywp-focus';
                }
            }

            self = self.parentElement;
        }
    }

    /**
     * Toggles `focus` class to allow submenu access on tablets.
     */
    ( function( gallerywp_secondary_container ) {
        var touchStartFn, gallerywp_secondary_i,
            parentLink = gallerywp_secondary_container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

        if ( 'ontouchstart' in window ) {
            touchStartFn = function( e ) {
                var menuItem = this.parentNode, gallerywp_secondary_i;

                if ( ! menuItem.classList.contains( 'gallerywp-focus' ) ) {
                    e.preventDefault();
                    for ( gallerywp_secondary_i = 0; gallerywp_secondary_i < menuItem.parentNode.children.length; ++gallerywp_secondary_i ) {
                        if ( menuItem === menuItem.parentNode.children[gallerywp_secondary_i] ) {
                            continue;
                        }
                        menuItem.parentNode.children[gallerywp_secondary_i].classList.remove( 'gallerywp-focus' );
                    }
                    menuItem.classList.add( 'gallerywp-focus' );
                } else {
                    menuItem.classList.remove( 'gallerywp-focus' );
                }
            };

            for ( gallerywp_secondary_i = 0; gallerywp_secondary_i < parentLink.length; ++gallerywp_secondary_i ) {
                parentLink[gallerywp_secondary_i].addEventListener( 'touchstart', touchStartFn, false );
            }
        }
    }( gallerywp_secondary_container ) );
} )();


( function() {
    var gallerywp_primary_container, gallerywp_primary_button, gallerywp_primary_menu, gallerywp_primary_links, gallerywp_primary_i, gallerywp_primary_len;

    gallerywp_primary_container = document.getElementById( 'gallerywp-primary-navigation' );
    if ( ! gallerywp_primary_container ) {
        return;
    }

    gallerywp_primary_button = gallerywp_primary_container.getElementsByTagName( 'button' )[0];
    if ( 'undefined' === typeof gallerywp_primary_button ) {
        return;
    }

    gallerywp_primary_menu = gallerywp_primary_container.getElementsByTagName( 'ul' )[0];

    // Hide menu toggle button if menu is empty and return early.
    if ( 'undefined' === typeof gallerywp_primary_menu ) {
        gallerywp_primary_button.style.display = 'none';
        return;
    }

    gallerywp_primary_menu.setAttribute( 'aria-expanded', 'false' );
    if ( -1 === gallerywp_primary_menu.className.indexOf( 'nav-menu' ) ) {
        gallerywp_primary_menu.className += ' nav-menu';
    }

    gallerywp_primary_button.onclick = function() {
        if ( -1 !== gallerywp_primary_container.className.indexOf( 'gallerywp-toggled' ) ) {
            gallerywp_primary_container.className = gallerywp_primary_container.className.replace( ' gallerywp-toggled', '' );
            gallerywp_primary_button.setAttribute( 'aria-expanded', 'false' );
            gallerywp_primary_menu.setAttribute( 'aria-expanded', 'false' );
        } else {
            gallerywp_primary_container.className += ' gallerywp-toggled';
            gallerywp_primary_button.setAttribute( 'aria-expanded', 'true' );
            gallerywp_primary_menu.setAttribute( 'aria-expanded', 'true' );
        }
    };

    // Get all the link elements within the menu.
    gallerywp_primary_links    = gallerywp_primary_menu.getElementsByTagName( 'a' );

    // Each time a menu link is focused or blurred, toggle focus.
    for ( gallerywp_primary_i = 0, gallerywp_primary_len = gallerywp_primary_links.length; gallerywp_primary_i < gallerywp_primary_len; gallerywp_primary_i++ ) {
        gallerywp_primary_links[gallerywp_primary_i].addEventListener( 'focus', gallerywp_primary_toggleFocus, true );
        gallerywp_primary_links[gallerywp_primary_i].addEventListener( 'blur', gallerywp_primary_toggleFocus, true );
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function gallerywp_primary_toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'gallerywp-focus' ) ) {
                    self.className = self.className.replace( ' gallerywp-focus', '' );
                } else {
                    self.className += ' gallerywp-focus';
                }
            }

            self = self.parentElement;
        }
    }

    /**
     * Toggles `focus` class to allow submenu access on tablets.
     */
    ( function( gallerywp_primary_container ) {
        var touchStartFn, gallerywp_primary_i,
            parentLink = gallerywp_primary_container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

        if ( 'ontouchstart' in window ) {
            touchStartFn = function( e ) {
                var menuItem = this.parentNode, gallerywp_primary_i;

                if ( ! menuItem.classList.contains( 'gallerywp-focus' ) ) {
                    e.preventDefault();
                    for ( gallerywp_primary_i = 0; gallerywp_primary_i < menuItem.parentNode.children.length; ++gallerywp_primary_i ) {
                        if ( menuItem === menuItem.parentNode.children[gallerywp_primary_i] ) {
                            continue;
                        }
                        menuItem.parentNode.children[gallerywp_primary_i].classList.remove( 'gallerywp-focus' );
                    }
                    menuItem.classList.add( 'gallerywp-focus' );
                } else {
                    menuItem.classList.remove( 'gallerywp-focus' );
                }
            };

            for ( gallerywp_primary_i = 0; gallerywp_primary_i < parentLink.length; ++gallerywp_primary_i ) {
                parentLink[gallerywp_primary_i].addEventListener( 'touchstart', touchStartFn, false );
            }
        }
    }( gallerywp_primary_container ) );
} )();