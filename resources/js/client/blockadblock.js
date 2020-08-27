!function (t) {
    var e = function (e) {
        this._options = {
            checkOnLoad: !1,
            resetOnEnd: !1,
            loopCheckTime: 50,
            loopMaxNumber: 5,
            baitClass: "pub_300x250 pub_300x250m pub_728x90 text-ad textAd text_ad text_ads text-ads text-ad-links",
            baitStyle: "width: 1px !important; height: 1px !important; position: absolute !important; left: -10000px !important; top: -1000px !important;",
            debug: !1
        }, this._var = {
            version: "3.2.1",
            bait: null,
            checking: !1,
            loop: null,
            loopNumber: 0,
            event: {detected: [], notDetected: []}
        }, void 0 !== e && this.setOption(e);
        var o = this, i = function () {
            setTimeout(function () {
                o._options.checkOnLoad === !0 && (o._options.debug === !0 && o._log("onload->eventCallback", "A check loading is launched"), null === o._var.bait && o._creatBait(), setTimeout(function () {
                    o.check()
                }, 1))
            }, 1)
        };
        void 0 !== t.addEventListener ? t.addEventListener("load", i, !1) : t.attachEvent("onload", i)
    };
    e.prototype._options = null, e.prototype._var = null, e.prototype._bait = null, e.prototype._log = function (t, e) {
        console.log("[BlockAdBlock][" + t + "] " + e)
    }, e.prototype.setOption = function (t, e) {
        if (void 0 !== e) {
            var o = t;
            t = {}, t[o] = e
        }
        for (var i in t) this._options[i] = t[i], this._options.debug === !0 && this._log("setOption", 'The option "' + i + '" he was assigned to "' + t[i] + '"');
        return this
    }, e.prototype._creatBait = function () {
        var e = document.createElement("div");
        e.setAttribute("class", this._options.baitClass), e.setAttribute("style", this._options.baitStyle), this._var.bait = t.document.body.appendChild(e), this._var.bait.offsetParent, this._var.bait.offsetHeight, this._var.bait.offsetLeft, this._var.bait.offsetTop, this._var.bait.offsetWidth, this._var.bait.clientHeight, this._var.bait.clientWidth, this._options.debug === !0 && this._log("_creatBait", "Bait has been created")
    }, e.prototype._destroyBait = function () {
        t.document.body.removeChild(this._var.bait), this._var.bait = null, this._options.debug === !0 && this._log("_destroyBait", "Bait has been removed")
    }, e.prototype.check = function (t) {
        if (void 0 === t && (t = !0), this._options.debug === !0 && this._log("check", "An audit was requested " + (t === !0 ? "with a" : "without") + " loop"), this._var.checking === !0) return this._options.debug === !0 && this._log("check", "A check was canceled because there is already an ongoing"), !1;
        this._var.checking = !0, null === this._var.bait && this._creatBait();
        var e = this;
        return this._var.loopNumber = 0, t === !0 && (this._var.loop = setInterval(function () {
            e._checkBait(t)
        }, this._options.loopCheckTime)), setTimeout(function () {
            e._checkBait(t)
        }, 1), this._options.debug === !0 && this._log("check", "A check is in progress ..."), !0
    }, e.prototype._checkBait = function (e) {
        var o = !1;
        if (null === this._var.bait && this._creatBait(), (null !== t.document.body.getAttribute("abp") || null === this._var.bait.offsetParent || 0 == this._var.bait.offsetHeight || 0 == this._var.bait.offsetLeft || 0 == this._var.bait.offsetTop || 0 == this._var.bait.offsetWidth || 0 == this._var.bait.clientHeight || 0 == this._var.bait.clientWidth) && (o = !0), void 0 !== t.getComputedStyle) {
            var i = t.getComputedStyle(this._var.bait, null);
            !i || "none" != i.getPropertyValue("display") && "hidden" != i.getPropertyValue("visibility") || (o = !0)
        }
        this._options.debug === !0 && this._log("_checkBait", "A check (" + (this._var.loopNumber + 1) + "/" + this._options.loopMaxNumber + " ~" + (1 + this._var.loopNumber * this._options.loopCheckTime) + "ms) was conducted and detection is " + (o === !0 ? "positive" : "negative")), e === !0 && (this._var.loopNumber++, this._var.loopNumber >= this._options.loopMaxNumber && this._stopLoop()), o === !0 ? (this._stopLoop(), this._destroyBait(), this.emitEvent(!0), e === !0 && (this._var.checking = !1)) : (null === this._var.loop || e === !1) && (this._destroyBait(), this.emitEvent(!1), e === !0 && (this._var.checking = !1))
    }, e.prototype._stopLoop = function (t) {
        clearInterval(this._var.loop), this._var.loop = null, this._var.loopNumber = 0, this._options.debug === !0 && this._log("_stopLoop", "A loop has been stopped")
    }, e.prototype.emitEvent = function (t) {
        this._options.debug === !0 && this._log("emitEvent", "An event with a " + (t === !0 ? "positive" : "negative") + " detection was called");
        var e = this._var.event[t === !0 ? "detected" : "notDetected"];
        for (var o in e) this._options.debug === !0 && this._log("emitEvent", "Call function " + (parseInt(o) + 1) + "/" + e.length), e.hasOwnProperty(o) && e[o]();
        return this._options.resetOnEnd === !0 && this.clearEvent(), this
    }, e.prototype.clearEvent = function () {
        this._var.event.detected = [], this._var.event.notDetected = [], this._options.debug === !0 && this._log("clearEvent", "The event list has been cleared")
    }, e.prototype.on = function (t, e) {
        return this._var.event[t === !0 ? "detected" : "notDetected"].push(e), this._options.debug === !0 && this._log("on", 'A type of event "' + (t === !0 ? "detected" : "notDetected") + '" was added'), this
    }, e.prototype.onDetected = function (t) {
        return this.on(!0, t)
    }, e.prototype.onNotDetected = function (t) {
        return this.on(!1, t)
    }, t.BlockAdBlock = e, void 0 === t.blockAdBlock && (t.blockAdBlock = new e({checkOnLoad: !0, resetOnEnd: !0}))
}(window);
