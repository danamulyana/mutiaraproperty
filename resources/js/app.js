/*
 |--------------------------------------------------------------------------
 | 3rd Party Libraries
 |--------------------------------------------------------------------------
 |
 | Import 3rd party library JS files.
 |
 */
import "./bootstrap";
import "./tw-starter";
import "./chart";
import "./highlight";
import "./feather";
import "./tiny-slider";
import "./tippy";
import "./datepicker";
import "./tail-select";
import "./validation";
import "./zoom";
import "./tabulator";
import "./calendar";
import 'alpinejs';
import Choices from "choices.js";

window.Choices = (element) => {
    return new Choices(element, {
        maxItemCount: 5,
        removeItemButton: true
    });
}

/*
 |--------------------------------------------------------------------------
 | Components
 |--------------------------------------------------------------------------
 |
 | Import JS components.
 |
 */
import "./maps";
import "./chat";
import "./show-modal";
import "./show-slide-over";
import "./show-dropdown";
import "./search";
import "./show-code";
import "./side-menu";
import "./mobile-menu";
import "./side-menu-tooltip";
import "./dark-mode-switcher";
