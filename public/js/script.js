const CONTAINER = $("#type-container");
const WEIGHT_CONTAINER = $("#weight-container");
const DIMENSTIONS_CONTAINER = $("#dimenstions-container");
const SIZE_CONTAINER = $("#size-container");
const PRODUCT_TYPE = $("#productType");

$(document).ready(function () {
    PRODUCT_TYPE.change(() => {
        typeSwitcher();
    });
    typeSwitcher();
    CONTAINER.hide();
});

const typeSwitcher = () => {
    PRODUCT_TYPE.on("change", function () {
        if (PRODUCT_TYPE.val() === "") {
            WEIGHT_CONTAINER.hide();
            DIMENSTIONS_CONTAINER.hide();
            SIZE_CONTAINER.hide();
        }
        if (PRODUCT_TYPE.val() === "book") {
            WEIGHT_CONTAINER.show();
            DIMENSTIONS_CONTAINER.hide();
            SIZE_CONTAINER.hide();
            CONTAINER.show();
        }
        if (PRODUCT_TYPE.val() === "dvd") {
            WEIGHT_CONTAINER.hide();
            DIMENSTIONS_CONTAINER.hide();
            SIZE_CONTAINER.show();
            CONTAINER.show();
        }
        if (PRODUCT_TYPE.val() === "furniture") {
            WEIGHT_CONTAINER.hide();
            SIZE_CONTAINER.hide();
            DIMENSTIONS_CONTAINER.show();
            CONTAINER.show();
        }
    });
}
