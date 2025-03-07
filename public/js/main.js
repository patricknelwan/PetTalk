// AOS initialization with optimized settings
AOS.init({
    // Core settings
    offset: 100,
    duration: 800,
    easing: "ease-in-out",

    // Animation behavior
    once: true,
    mirror: true,

    // Anchor placement and delay
    anchorPlacement: "center-bottom",
    delay: 100,

    // Disable on mobile devices for better performance
    disable: function () {
        return window.innerWidth < 768;
    },

    // Disable if user prefers reduced motion
    disableMutationObserver: true,
});

// Enhanced Accordion implementation
class EnhancedAccordion {
    constructor(element, options = {}) {
        this.element = element;
        this.options = {
            multiple: false,
            animationSpeed: 300,
            activeClass: "active",
            ...options,
        };

        this.init();
    }

    init() {
        const links = this.element.find(".link");

        links.on("click", (e) => {
            const $link = $(e.currentTarget);
            const $submenu = $link.next(".submenu");
            const $parent = $link.parent();

            // Handle multiple open panels
            if (!this.options.multiple) {
                this.element
                    .find(".submenu")
                    .not($submenu)
                    .slideUp(this.options.animationSpeed)
                    .parent()
                    .removeClass(this.options.activeClass);
            }

            // Toggle current panel
            $submenu.slideToggle(this.options.animationSpeed);
            $parent.toggleClass(this.options.activeClass);

            // Trigger custom events
            this.element.trigger("accordion:toggle", [$parent, $submenu]);
        });
    }
}

// Initialize accordion with custom options
$(document).ready(() => {
    const accordion = new EnhancedAccordion($("#accordion"), {
        multiple: false,
        animationSpeed: 250,
        activeClass: "open",
    });
});
