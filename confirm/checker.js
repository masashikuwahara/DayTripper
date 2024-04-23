"use strict";
const change = () => {
    var _a, _b, _c, _d, _e, _f, _g, _h, _j, _k;
    const check1 = (_b = (_a = document.getElementById("check1")) === null || _a === void 0 ? void 0 : _a.checked) !== null && _b !== void 0 ? _b : false;
    const check2 = (_d = (_c = document.getElementById("check2")) === null || _c === void 0 ? void 0 : _c.checked) !== null && _d !== void 0 ? _d : false;
    const check3 = (_f = (_e = document.getElementById("check3")) === null || _e === void 0 ? void 0 : _e.checked) !== null && _f !== void 0 ? _f : false;
    const check4 = (_h = (_g = document.getElementById("check4")) === null || _g === void 0 ? void 0 : _g.checked) !== null && _h !== void 0 ? _h : false;
    const check5 = (_k = (_j = document.getElementById("check5")) === null || _j === void 0 ? void 0 : _j.checked) !== null && _k !== void 0 ? _k : false;
    const checkBtn = document.getElementById("check-btn");
    if (checkBtn) {
        checkBtn.disabled = !(check1 && check2 && check3 && check4 && check5);
    }
};
const submitChk = () => {
    const flag = confirm("OK！\n\nすべてそろっています");
    return flag;
};
