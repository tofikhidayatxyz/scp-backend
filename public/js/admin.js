(()=>{function t(t,r){return function(t){if(Array.isArray(t))return t}(t)||function(t,e){var r=null==t?null:"undefined"!=typeof Symbol&&t[Symbol.iterator]||t["@@iterator"];if(null==r)return;var n,a,o=[],l=!0,c=!1;try{for(r=r.call(t);!(l=(n=r.next()).done)&&(o.push(n.value),!e||o.length!==e);l=!0);}catch(t){c=!0,a=t}finally{try{l||null==r.return||r.return()}finally{if(c)throw a}}return o}(t,r)||function(t,r){if(!t)return;if("string"==typeof t)return e(t,r);var n=Object.prototype.toString.call(t).slice(8,-1);"Object"===n&&t.constructor&&(n=t.constructor.name);if("Map"===n||"Set"===n)return Array.from(t);if("Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return e(t,r)}(t,r)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function e(t,e){(null==e||e>t.length)&&(e=t.length);for(var r=0,n=new Array(e);r<e;r++)n[r]=t[r];return n}for(var r={theme:{localStorage:"tablerTheme",default:"light"},"menu-position":{localStorage:"tablerMenuPosition",default:"top"},"menu-behavior":{localStorage:"tablerMenuBehavior",default:"sticky"},"container-layout":{localStorage:"tablerContainerLayout",default:"boxed"}},n={},a=0,o=Object.entries(r);a<o.length;a++){var l=t(o[a],2),c=l[0],i=l[1],u=localStorage.getItem(i.localStorage);n[c]=u||i.default}var s=function(){document.body.classList.remove("theme-dark","theme-light"),document.body.classList.add("theme-".concat(n.theme))};!function(){for(var t=window.location.search.substring(1).split("&"),e=0;e<t.length;e++){var a=t[e].split("="),o=a[0],l=a[1];r[o]&&(localStorage.setItem(r[o].localStorage,l),n[o]=l)}}(),s();var f=document.querySelector("#offcanvasSettings");f&&(f.addEventListener("submit",(function(e){e.preventDefault(),function(e){for(var a=0,o=Object.entries(r);a<o.length;a++){var l=t(o[a],2),c=l[0],i=l[1],u=e.querySelector('[name="settings-'.concat(c,'"]:checked')).value;localStorage.setItem(i.localStorage,u),n[c]=u}s(),window.dispatchEvent(new Event("resize")),new bootstrap.Offcanvas(e).hide()}(f)})),function(e){for(var a=0,o=Object.entries(r);a<o.length;a++){var l=t(o[a],2),c=l[0],i=(l[1],e.querySelector('[name="settings-'.concat(c,'"][value="').concat(n[c],'"]')));i&&(i.checked=!0)}}(f))})();
//# sourceMappingURL=admin.js.map