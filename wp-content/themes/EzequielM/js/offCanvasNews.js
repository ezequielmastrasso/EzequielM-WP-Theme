"use strict";

(function(window) {

    window.OffCanvasMenuController = function(options){

        options = options || {};

        this.$menu = options.$menu;
        this.menuExpandedClass = options.menuExpandedClass;

        // Escape if the menu is not found.
        if(this.$menu.length == 0 || !this.menuExpandedClass)
            return;

        this.$menuToggle = options.$menuToggle || [];
        this.$menuExpandedClassTarget = options.$menuExpandedClassTarget || $('body');
        this.position = options.position || 'left';

        this.$wrapper = options.wrapper || $('#outer-wrapper');
        this.wrapper = this.$wrapper[0];

        this.dragHandleOffset = options.dragHandleOffset || this.$menuToggle.outerWidth();
        this.expandedWidth = this.$menu.outerWidth();

        if(this.$menuToggle.length > 0){
            var self = this;

            // Set up toggle button:
            this.$menuToggle.click(function(){
                var method = !self.$menuExpandedClassTarget.hasClass(self.menuExpandedClass) ? 'addClass' : 'removeClass';
                self.$menuExpandedClassTarget[method](self.menuExpandedClass);
            });
        }

        // add event listeners
        if (this.wrapper.addEventListener) {
            this.wrapper.addEventListener('touchstart', this, false);
            this.wrapper.addEventListener('touchmove', this, false);
            this.wrapper.addEventListener('touchend', this, false);
            this.wrapper.addEventListener('touchcancel', this, false);
        }

    }

    window.OffCanvasMenuController.prototype = {

        start: null,

        handleEvent: function (e) {
            switch (e.type) {
                case 'touchstart': this.onTouchStart(e); break;
                case 'touchmove':  this.onTouchMove(e); break;
                case 'touchcancel':
                case 'touchend': this.onTouchEnd(e); break;
            }
        },

        currentPosition: function(){
            return this.position == 'left' ? this.$menu.offset().left + this.expandedWidth
                : this.$menu.offset().left;
        },

        inBounds: function(position){
            return (this.position == 'left' && position >= 0 && position <= this.expandedWidth) ||
                (position >= -this.expandedWidth && position <= 0);
        },

        onTouchStart: function(e){

            var pageX = e.touches[0].pageX;

            // Escape if invalid start touch position
            if(this.currentPosition() - this.dragHandleOffset > pageX ||
                this.currentPosition() + this.dragHandleOffset < pageX)
                return;

            this.start = {
                startingX: this.currentPosition(),

                // get touch coordinates for delta calculations in onTouchMove
                pageX: pageX,
                pageY: e.touches[0].pageY
            };

            // reset deltaX
            this.deltaX = this.$wrapper.position().left;

            // used for testing first onTouchMove event
            this.isScrolling = undefined;

            // set transition time to 0 for 1-to-1 touch movement
            this.wrapper.style.MozTransitionDuration = this.wrapper.style.webkitTransitionDuration = 0;

            e.stopPropagation();
        },

        onTouchMove: function(e){

            // Escape if invalid start or not in bounds:
            if(!this.start)
                return;

            this.deltaX = e.touches[0].pageX - this.start.pageX;

            // determine if scrolling test has run - one time test
            if (typeof this.isScrolling == 'undefined') {
                this.isScrolling = !!(this.isScrolling || Math.abs(this.deltaX) < Math.abs(e.touches[0].pageY - this.start.pageY));
            }

            // if user is not trying to scroll vertically
            if (!this.isScrolling) {

                // prevent native scrolling
                e.preventDefault();

                var newPos = this.position == 'left' ? this.start.startingX + this.deltaX
                    : this.deltaX - ($(window).width() - this.start.startingX);

                if(!this.inBounds(newPos))
                    return;

                // translate immediately 1-to-1
                this.wrapper.style.MozTransform = this.wrapper.style.webkitTransform = 'translate3d(' + newPos + 'px,0,0)';

                e.stopPropagation();
            }


        },

        onTouchEnd: function(e){

            // Escape if invalid start:
            if(!this.start)
                return;

            // if not scrolling vertically
            if (!this.isScrolling) {

                // determine if swipe will trigger open/close menu
                var isOpeningMenu = (this.position == 'left' && this.deltaX > 0) ||
                    (this.position == 'right' && this.deltaX < 0);

                // Reset styles
                this.$wrapper.attr('style', '');

                // open/close menu:
                var method = isOpeningMenu ? 'addClass' : 'removeClass';
                this.$menuExpandedClassTarget[method](this.menuExpandedClass);
            }

            // Reset start object:
            this.start = null;

            e.stopPropagation();
        }

    }
})(window);