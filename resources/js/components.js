import { Dropdown } from 'flowbite'


/**
 * Initialize dropdowns
 * @param {number} wait - time to wait before initializing dropdowns
 */
function initDropdowns(wait = 0) {
    setTimeout(() => {
        document.querySelectorAll(".message")
            ?.forEach((message) => {
                const messageId = message.getAttribute('data-message-id')
                const trigger = message.querySelector(`#message-options-trigger-${messageId}`)
                const target = message.querySelector(`#message-options-menu-${messageId}`)

                console.dir(trigger)
                console.dir(target)

                const options = {
                    placement: 'bottom',
                    triggerType: 'click',
                    offsetSkidding: 0,
                    offsetDistance: 10,
                    delay: 300,
                    ignoreClickOutsideClass: false,
                    onHide: () => {
                        console.log('dropdown has been hidden');
                    },
                    onShow: () => {
                        console.log('dropdown has been shown');
                    },
                    onToggle: () => {
                        console.log('dropdown has been toggled');
                    },
                };

                // instance options object
                const instanceOptions = {
                    id: message.getAttribute('data-message-id').toString(),
                    override: true
                };

                const dropdown = new Dropdown(trigger, target, options, instanceOptions)
                console.dir(dropdown)
            });
    }, wait)
}

window.addEventListener("chat.select", () => initDropdowns(100))
window.addEventListener("chat.moreMessagesLoaded", () => initDropdowns())

console.log('components.js loaded')
