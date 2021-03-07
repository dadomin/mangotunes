window.onload = function() {
    openMenu = new openMenu();
};

class openMenu {
    constructor() {
        this.isOpen = false;
        $("#header-menu-btn").on("click", (e) => {
            this.check();
        });
        
        $(document).click((e) => {
            if (!$("#header-menu-btn>span>i").is(e.target) && this.isOpen == true) {
                this.check();
            }
        });
    }

    check() {
        if (this.isOpen) {
            $("#header-menu").css("visibility", "hidden").css("opacity", "0");
        } else {
            $("#header-menu").css("visibility", "visible").css("opacity", "1");
        }
        this.isOpen = !this.isOpen;
    }

}