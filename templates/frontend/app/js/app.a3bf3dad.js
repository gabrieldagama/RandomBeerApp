(function(e){function t(t){for(var r,i,s=t[0],c=t[1],u=t[2],p=0,d=[];p<s.length;p++)i=s[p],a[i]&&d.push(a[i][0]),a[i]=0;for(r in c)Object.prototype.hasOwnProperty.call(c,r)&&(e[r]=c[r]);l&&l(t);while(d.length)d.shift()();return o.push.apply(o,u||[]),n()}function n(){for(var e,t=0;t<o.length;t++){for(var n=o[t],r=!0,s=1;s<n.length;s++){var c=n[s];0!==a[c]&&(r=!1)}r&&(o.splice(t--,1),e=i(i.s=n[0]))}return e}var r={},a={app:0},o=[];function i(t){if(r[t])return r[t].exports;var n=r[t]={i:t,l:!1,exports:{}};return e[t].call(n.exports,n,n.exports,i),n.l=!0,n.exports}i.m=e,i.c=r,i.d=function(e,t,n){i.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},i.r=function(e){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},i.t=function(e,t){if(1&t&&(e=i(e)),8&t)return e;if(4&t&&"object"===typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(i.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)i.d(n,r,function(t){return e[t]}.bind(null,r));return n},i.n=function(e){var t=e&&e.__esModule?function(){return e["default"]}:function(){return e};return i.d(t,"a",t),t},i.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},i.p="/app/";var s=window["webpackJsonp"]=window["webpackJsonp"]||[],c=s.push.bind(s);s.push=t,s=s.slice();for(var u=0;u<s.length;u++)t(s[u]);var l=c;o.push([0,"chunk-vendors"]),n()})({0:function(e,t,n){e.exports=n("56d7")},"56d7":function(e,t,n){"use strict";n.r(t);n("cadf"),n("551c"),n("097d");var r=n("2b0e"),a=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{attrs:{id:"app"}},[n("RandomBeerApp")],1)},o=[],i=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{staticClass:"App"},[n("header",{staticClass:"App-header"},[n("h1",{staticClass:"App-title"},[e._v("Vue Random Beer App!")]),n("button",{on:{click:e.getRandomBeer}},[e._v("Show another beer")])]),n("div",{staticClass:"App-body"},[e._m(0),n("div",{staticClass:"right-container"},[n("div",{staticClass:"beer-data"},[n("div",{staticClass:"beer-name"},[n("h2",[e._v(e._s(e.beer.name))])]),n("div",{staticClass:"beer-details"},[n("label",[e._v("Description:")]),n("p",{staticClass:"description"},[e._v(e._s(e.beer.description))]),n("label",[e._v("Abv:")]),n("p",{staticClass:"abv"},[e._v(e._s(e.beer.abv))]),n("label",[e._v("Producer Location:")]),n("p",{staticClass:"producer-location"},[e._v(e._s(e.beer.producerLocation))])])])])])])},s=[function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("div",{staticClass:"left-container"},[r("img",{attrs:{src:n("690e"),alt:"Beer Icon"}})])}],c=(n("7f7f"),n("bc3a")),u=n.n(c),l={data:function(){return{token:null,beer:{name:null,description:"",abv:null,producerLocation:!1}}},methods:{getToken:function(){var e={auth:{username:"apiuser",password:"apipwd"}},t=this;return u.a.get("http://localhost/v1/auth/token",e).then(function(e){t.token=e.data.data.token})},getRandomBeer:function(){var e=this;if(null===this.token)return this.getToken().then(function(){e.getRandomBeer()}),!1;var t={headers:{Authorization:"Bearer "+this.token}};u.a.get("http://localhost/v1/beer/random",t).then(function(t){e.beer.name=t.data.data.name,e.beer.description=t.data.data.description,e.beer.abv=t.data.data.abv,e.beer.producerLocation=t.data.data.producerLocation})}},mounted:function(){this.getRandomBeer()}},p=l,d=n("2877"),f=Object(d["a"])(p,i,s,!1,null,null,null);f.options.__file="RandomBeerApp.vue";var v=f.exports,b=(n("a347"),{name:"app",components:{RandomBeerApp:v}}),h=b,m=Object(d["a"])(h,a,o,!1,null,null,null);m.options.__file="App.vue";var _=m.exports;r["a"].config.productionTip=!1,new r["a"]({render:function(e){return e(_)}}).$mount("#app")},"690e":function(e,t,n){e.exports=n.p+"img/beer-icon.a18759f5.png"},a347:function(e,t,n){}});
//# sourceMappingURL=app.a3bf3dad.js.map