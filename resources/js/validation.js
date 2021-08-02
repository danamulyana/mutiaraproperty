import Pristine from "pristinejs";

(function (cash) {
    "use strict";

    cash(".validate-form").each(function () {
        let pristine = new Pristine(this, {
            classTo: "input-form",
            errorClass: "has-error",
            errorTextParent: "input-form",
            errorTextClass: "text-primary-3 mt-2",
        });

        pristine.addValidator(
            cash(this).find('input[type="url"]')[0],
            function (value) {
                let expression = /[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)?/gi;
                let regex = new RegExp(expression);
                if (!value.length || (value.length && value.match(regex))) {
                    return true;
                }
                return false;
            },
            "This field is URL format only",
            2,
            false
        );

        cash(this).on("submit", function (e) {
            e.preventDefault();
            onSubmit(pristine);
        });
    });
})(cash);
