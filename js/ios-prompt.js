/*
 * 对话框插件
 * 赵欢磊 20150915
 * http://www.cnblogs.com/huanlei/p/4810091.html
 */

var dialog = {

    //对话框
    alert: function (obj, callback) {
        var content = obj.content || obj || "",
            btnText = obj.btnText || "确定",
            boxClass = obj.boxClass || "",
            alertHtml = '\
                <div class="ios-dialog '+ boxClass +'">\
                    <div class="ios-dialog-box">\
                        <div class="ios-dialog-detail">' + content + '</div>\
                        <div class="ios-dialog-opera">\
                            <button class="ios-dialog-btn ios-dialog-btn-close">' + btnText +  '</button>\
                        </div>\
                    </div>\
                    <div class="ios-dialog-overlay"></div>\
                </div>';
        //document.body.insertAdjacentHTML("beforeend", alertHtml);
        $(".ios-dialog").remove();
        $("body").append(alertHtml);
        var dialog = $(".ios-dialog"),
            btnClose = $(".ios-dialog-btn-close");
        btnClose.on("click", function () {
            dialog.remove();
            if (callback) {
                callback();
            }
        });
    },
    confirm: function (obj, callback) {
        var content = obj.content || obj || "",
            okText = obj.okText || "确定",
            cancelText = obj.cancelText || "取消",
            boxClass = obj.boxClass || "",
            confirmHtml = '\
                <div class="ios-dialog '+ boxClass +'">\
                    <div class="ios-dialog-box">\
                        <div class="ios-dialog-detail">' + content + '</div>\
                        <div class="ios-dialog-opera">\
                            <button class="ios-dialog-btn ios-dialog-btn-cancel">' + cancelText + '</button>\
                            <button class="ios-dialog-btn ios-dialog-btn-ok">' + okText + '</button>\
                        </div>\
                    </div>\
                    <div class="ios-dialog-overlay"></div>\
                </div>';
        $(".dialog").remove();
        $("body").append(confirmHtml);
        var dialog = $(".ios-dialog"),
            btnOk = $(".ios-dialog-btn-ok"),
            btnCancel = $(".ios-dialog-btn-cancel"),
            flag = true,
            oprea = function () {
                dialog.remove();
                if (callback) {
                    callback(flag);
                }
            };
        btnOk.on("click", function () {
            flag = true;
            oprea();
        });
        btnCancel.on("click", function () {
            flag = false;
            oprea();
        });
    },
    prompt: function (obj, callback) {
        var content = obj.content || obj || "",
            boxClass = obj.boxClass || "",
            delay = obj.delay || 2000,
            msgHtml = '<div class="ios-prompt ' + boxClass + '">' + content + '</div>';
        $(".ios-prompt").remove();
        $("body").append(msgHtml);
        var prompt = $(".ios-prompt"),
            promptWidth = prompt.width();
        prompt.css({"margin-left": -promptWidth / 2});
        setTimeout(function () {
            prompt.css({ "opacity": 0});
            setTimeout(function () {
                prompt.remove();
                if (callback) {
                    callback();
                }
            }, 500);
        }, delay);
    }

};

//替换系统默认对话框
window.alert = dialog.alert;
window.confirm = dialog.confirm;
window.prompt = dialog.prompt;