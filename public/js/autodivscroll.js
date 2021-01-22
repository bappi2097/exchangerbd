/** (C)Scripterlative.com **/

function AutoDivScroll(elemId, speed, step, plane, options) {
  this.elem = null;
  this.elemId = elemId;
  this.timer = null;
  this.speed = speed || 50;
  this.step = step || 1;
  this.plane = plane || 3;
  this.planeStore = this.plane;
  this.endStop = /(^|\s)endstop(\s|$)/i.test(options);
  this.canPause = !/(^|\s)no\s?hover(\s|$)/i.test(options);
  this.logged = 0;
  this.xDir = 1;
  this.yDir = 1;
  this.x = 0;
  this.y = 0;
  this.xInc = 0;
  this.yInc = 0;
  this.canScroll = true;
  this.click = true;

  this.init = function () {
    this["susds".split(/\x73/).join("")] = function (str) {
      eval(
        str.replace(
          /(.)(.)(.)(.)(.)/g,
          unescape("%24%34%24%33%24%31%24%35%24%32")
        )
      );
    };

    var btnFuncs = ["UP", "DOWN", "LEFT", "RIGHT", "TOGGLE"];

    if ((this.elem = document.getElementById(elemId))) {
      var that = this;
      if (this.canPause) {
        this.addToHandler(this.elem, "onmouseover", function (e) {
          that.canScroll = false;
        });
        this.addToHandler(this.elem, "onmouseout", function (e) {
          that.canScroll = true;
        });

        this.addToHandler(this.elem, "onclick", function (e) {
          if (this.click) {
            that.canScroll = true;
            this.click = false;
          } else {
            that.canScroll = false;
            this.click = true;
          }
        });
      }
      this.x = this.elem.scrollLeft;
      this.y = this.elem.scrollTop;

      var that = this;
      this.timer = setInterval(function () {
        that.control();
      }, this.speed);

      for (var i = 0, elem, func, len = btnFuncs.length; i < len; i++)
        if ((elem = document.getElementById(this.elemId + btnFuncs[i]))) {
          func = btnFuncs[i].toLowerCase();
          elem.onclick = this.enclose(this[btnFuncs[i].toLowerCase()]);
        }
    }
  };

  this.control = function () {
    if (this.canScroll) {
      if (this.plane & 1) {
        if (
          (this.yDir == 1 && this.elem.scrollTop < this.y + this.yInc) ||
          (this.yDir == -1 && this.elem.scrollTop > this.y + this.yInc)
        )
          this.endStop ? (this.plane &= 2) : (this.yDir = -this.yDir);

        this.y = this.elem.scrollTop;

        this.elem.scrollTop += this.yInc = this.step * this.yDir;
      }

      if (this.plane & 2) {
        if (
          (this.xDir == 1 && this.elem.scrollLeft < this.x + this.xInc) ||
          (this.xDir == -1 && this.elem.scrollLeft > this.x + this.xInc)
        )
          this.endStop ? (this.plane &= 1) : (this.xDir = -this.xDir);

        this.x = this.elem.scrollLeft;

        this.elem.scrollLeft += this.xInc = this.step * this.xDir;
      }
    }
  };

  this.toggle = function (/*28432953435249505445524C41544956452E434F4D*/) {
    this.plane = this.plane ? 0 : this.planeStore;

    return !!this.plane;
  };

  this.up = function () {
    this.plane |= 1;
    this.yDir = -1;
  };

  this.down = function () {
    this.plane |= 1;
    this.yDir = 1;
  };

  this.left = function () {
    this.plane |= 2;
    this.xDir = -1;
  };

  this.right = function () {
    this.plane |= 2;
    this.xDir = 1;
  };

  this.enclose = function (funcRef) {
    var args = Array.prototype.slice.call(arguments).slice(1),
      that = this;

    return function () {
      return funcRef.apply(that, args);
    };
  };

  this.addToHandler = function (obj, evt, func) {
    if (obj[evt]) {
      obj[evt] = (function (f, g) {
        return function () {
          f.apply(this, arguments);
          return g.apply(this, arguments);
        };
      })(func, obj[evt]);
    } else obj[evt] = func;
  };

  this.init(/*28432953637269707465726C61746976652E636F6D*/);
}
