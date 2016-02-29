if(!document.createElement("canvas").getContext){(function(){function a(){return this.context_||(this.context_=new S(this))}function l(e,t,n){var r=f.call(arguments,2);return function(){return e.apply(t,r.concat(f.call(arguments)))}}function h(e){var t=e.srcElement;switch(e.propertyName){case"width":t.style.width=t.attributes.width.nodeValue+"px";t.getContext().clearRect();break;case"height":t.style.height=t.attributes.height.nodeValue+"px";t.getContext().clearRect();break}}function p(e){var t=e.srcElement;if(t.firstChild){t.firstChild.style.width=t.clientWidth+"px";t.firstChild.style.height=t.clientHeight+"px"}}function g(){return[[1,0,0],[0,1,0],[0,0,1]]}function y(e,t){var n=g();for(var r=0;r<3;r++){for(var i=0;i<3;i++){var s=0;for(var o=0;o<3;o++){s+=e[r][o]*t[o][i]}n[r][i]=s}}return n}function b(e,t){t.fillStyle=e.fillStyle;t.lineCap=e.lineCap;t.lineJoin=e.lineJoin;t.lineWidth=e.lineWidth;t.miterLimit=e.miterLimit;t.shadowBlur=e.shadowBlur;t.shadowColor=e.shadowColor;t.shadowOffsetX=e.shadowOffsetX;t.shadowOffsetY=e.shadowOffsetY;t.strokeStyle=e.strokeStyle;t.globalAlpha=e.globalAlpha;t.arcScaleX_=e.arcScaleX_;t.arcScaleY_=e.arcScaleY_;t.lineScale_=e.lineScale_}function w(e){var t,n=1;e=String(e);if(e.substring(0,3)=="rgb"){var r=e.indexOf("(",3);var i=e.indexOf(")",r+1);var s=e.substring(r+1,i).split(",");t="#";for(var o=0;o<3;o++){t+=d[Number(s[o])]}if(s.length==4&&e.substr(3,1)=="a"){n=s[3]}}else{t=e}return{color:t,alpha:n}}function E(e){switch(e){case"butt":return"flat";case"round":return"round";case"square":default:return"square"}}function S(e){this.m_=g();this.mStack_=[];this.aStack_=[];this.currentPath_=[];this.strokeStyle="#000";this.fillStyle="#000";this.lineWidth=1;this.lineJoin="miter";this.lineCap="butt";this.miterLimit=o*1;this.globalAlpha=1;this.canvas=e;var t=e.ownerDocument.createElement("div");t.style.width=e.clientWidth+"px";t.style.height=e.clientHeight+"px";t.style.overflow="hidden";t.style.position="absolute";e.appendChild(t);this.element_=t;this.arcScaleX_=1;this.arcScaleY_=1;this.lineScale_=1}function T(e,t,n,r){e.currentPath_.push({type:"bezierCurveTo",cp1x:t.x,cp1y:t.y,cp2x:n.x,cp2y:n.y,x:r.x,y:r.y});e.currentX_=r.x;e.currentY_=r.y}function N(e){for(var t=0;t<3;t++){for(var n=0;n<2;n++){if(!isFinite(e[t][n])||isNaN(e[t][n])){return false}}}return true}function C(e,t,n){if(!N(t)){return}e.m_=t;if(n){var r=t[0][0]*t[1][1]-t[0][1]*t[1][0];e.lineScale_=s(i(r))}}function k(e){this.type_=e;this.x0_=0;this.y0_=0;this.r0_=0;this.x1_=0;this.y1_=0;this.r1_=0;this.colors_=[]}function L(){}var e=Math;var t=e.round;var n=e.sin;var r=e.cos;var i=e.abs;var s=e.sqrt;var o=10;var u=o/2;var f=Array.prototype.slice;var c={init:function(e){if(/MSIE/.test(navigator.userAgent)&&!window.opera){var t=e||document;t.createElement("canvas");if(t.readyState!=="complete"){t.attachEvent("onreadystatechange",l(this.init_,this,t))}else{this.init_(t)}}},init_:function(e){if(!e.namespaces["g_vml_"]){e.namespaces.add("g_vml_","urn:schemas-microsoft-com:vml","#default#VML")}if(!e.namespaces["g_o_"]){e.namespaces.add("g_o_","urn:schemas-microsoft-com:office:office","#default#VML")}if(!e.styleSheets["ex_canvas_"]){var t=e.createStyleSheet();t.owningElement.id="ex_canvas_";t.cssText="canvas{display:inline-block;overflow:hidden;"+"text-align:left;width:300px;height:150px}"+"g_vml_\\:*{behavior:url(#default#VML)}"+"g_o_\\:*{behavior:url(#default#VML)}"}var n=e.getElementsByTagName("canvas");for(var r=0;r<n.length;r++){this.initElement(n[r])}},initElement:function(e){if(!e.getContext){e.getContext=a;e.innerHTML="";e.attachEvent("onpropertychange",h);e.attachEvent("onresize",p);var t=e.attributes;if(t.width&&t.width.specified){e.style.width=t.width.nodeValue+"px"}else{e.width=e.clientWidth}if(t.height&&t.height.specified){e.style.height=t.height.nodeValue+"px"}else{e.height=e.clientHeight}}return e}};c.init();var d=[];for(var v=0;v<16;v++){for(var m=0;m<16;m++){d[v*16+m]=v.toString(16)+m.toString(16)}}var x=S.prototype;x.clearRect=function(){this.element_.innerHTML=""};x.beginPath=function(){this.currentPath_=[]};x.moveTo=function(e,t){var n=this.getCoords_(e,t);this.currentPath_.push({type:"moveTo",x:n.x,y:n.y});this.currentX_=n.x;this.currentY_=n.y};x.lineTo=function(e,t){var n=this.getCoords_(e,t);this.currentPath_.push({type:"lineTo",x:n.x,y:n.y});this.currentX_=n.x;this.currentY_=n.y};x.bezierCurveTo=function(e,t,n,r,i,s){var o=this.getCoords_(i,s);var u=this.getCoords_(e,t);var a=this.getCoords_(n,r);T(this,u,a,o)};x.quadraticCurveTo=function(e,t,n,r){var i=this.getCoords_(e,t);var s=this.getCoords_(n,r);var o={x:this.currentX_+2/3*(i.x-this.currentX_),y:this.currentY_+2/3*(i.y-this.currentY_)};var u={x:o.x+(s.x-this.currentX_)/3,y:o.y+(s.y-this.currentY_)/3};T(this,o,u,s)};x.arc=function(e,t,i,s,a,f){i*=o;var l=f?"at":"wa";var c=e+r(s)*i-u;var h=t+n(s)*i-u;var p=e+r(a)*i-u;var d=t+n(a)*i-u;if(c==p&&!f){c+=.125}var v=this.getCoords_(e,t);var m=this.getCoords_(c,h);var g=this.getCoords_(p,d);this.currentPath_.push({type:l,x:v.x,y:v.y,radius:i,xStart:m.x,yStart:m.y,xEnd:g.x,yEnd:g.y})};x.rect=function(e,t,n,r){this.moveTo(e,t);this.lineTo(e+n,t);this.lineTo(e+n,t+r);this.lineTo(e,t+r);this.closePath()};x.strokeRect=function(e,t,n,r){var i=this.currentPath_;this.beginPath();this.moveTo(e,t);this.lineTo(e+n,t);this.lineTo(e+n,t+r);this.lineTo(e,t+r);this.closePath();this.stroke();this.currentPath_=i};x.fillRect=function(e,t,n,r){var i=this.currentPath_;this.beginPath();this.moveTo(e,t);this.lineTo(e+n,t);this.lineTo(e+n,t+r);this.lineTo(e,t+r);this.closePath();this.fill();this.currentPath_=i};x.createLinearGradient=function(e,t,n,r){var i=new k("gradient");i.x0_=e;i.y0_=t;i.x1_=n;i.y1_=r;return i};x.createRadialGradient=function(e,t,n,r,i,s){var o=new k("gradientradial");o.x0_=e;o.y0_=t;o.r0_=n;o.x1_=r;o.y1_=i;o.r1_=s;return o};x.drawImage=function(n,r){var i,s,u,a,f,l,c,h;var p=n.runtimeStyle.width;var d=n.runtimeStyle.height;n.runtimeStyle.width="auto";n.runtimeStyle.height="auto";var v=n.width;var m=n.height;n.runtimeStyle.width=p;n.runtimeStyle.height=d;if(arguments.length==3){i=arguments[1];s=arguments[2];f=l=0;c=u=v;h=a=m}else if(arguments.length==5){i=arguments[1];s=arguments[2];u=arguments[3];a=arguments[4];f=l=0;c=v;h=m}else if(arguments.length==9){f=arguments[1];l=arguments[2];c=arguments[3];h=arguments[4];i=arguments[5];s=arguments[6];u=arguments[7];a=arguments[8]}else{throw Error("Invalid number of arguments")}var g=this.getCoords_(i,s);var y=c/2;var b=h/2;var w=[];var E=10;var S=10;w.push(" <g_vml_:group",' coordsize="',o*E,",",o*S,'"',' coordorigin="0,0"',' style="width:',E,"px;height:",S,"px;position:absolute;");if(this.m_[0][0]!=1||this.m_[0][1]){var x=[];x.push("M11=",this.m_[0][0],",","M12=",this.m_[1][0],",","M21=",this.m_[0][1],",","M22=",this.m_[1][1],",","Dx=",t(g.x/o),",","Dy=",t(g.y/o),"");var T=g;var N=this.getCoords_(i+u,s);var C=this.getCoords_(i,s+a);var k=this.getCoords_(i+u,s+a);T.x=e.max(T.x,N.x,C.x,k.x);T.y=e.max(T.y,N.y,C.y,k.y);w.push("padding:0 ",t(T.x/o),"px ",t(T.y/o),"px 0;filter:progid:DXImageTransform.Microsoft.Matrix(",x.join(""),", sizingmethod='clip');")}else{w.push("top:",t(g.y/o),"px;left:",t(g.x/o),"px;")}w.push(' ">','<g_vml_:image src="',n.src,'"',' style="width:',o*u,"px;"," height:",o*a,'px;"',' cropleft="',f/v,'"',' croptop="',l/m,'"',' cropright="',(v-f-c)/v,'"',' cropbottom="',(m-l-h)/m,'"'," />","</g_vml_:group>");this.element_.insertAdjacentHTML("BeforeEnd",w.join(""))};x.stroke=function(n){var r=[];var i=false;var s=w(n?this.fillStyle:this.strokeStyle);var u=s.color;var a=s.alpha*this.globalAlpha;var f=10;var l=10;r.push("<g_vml_:shape",' filled="',!!n,'"',' style="position:absolute;width:',f,"px;height:",l,'px;"',' coordorigin="0 0" coordsize="',o*f," ",o*l,'"',' stroked="',!n,'"',' path="');var c=false;var h={x:null,y:null};var p={x:null,y:null};for(var d=0;d<this.currentPath_.length;d++){var v=this.currentPath_[d];var m;switch(v.type){case"moveTo":m=v;r.push(" m ",t(v.x),",",t(v.y));break;case"lineTo":r.push(" l ",t(v.x),",",t(v.y));break;case"close":r.push(" x ");v=null;break;case"bezierCurveTo":r.push(" c ",t(v.cp1x),",",t(v.cp1y),",",t(v.cp2x),",",t(v.cp2y),",",t(v.x),",",t(v.y));break;case"at":case"wa":r.push(" ",v.type," ",t(v.x-this.arcScaleX_*v.radius),",",t(v.y-this.arcScaleY_*v.radius)," ",t(v.x+this.arcScaleX_*v.radius),",",t(v.y+this.arcScaleY_*v.radius)," ",t(v.xStart),",",t(v.yStart)," ",t(v.xEnd),",",t(v.yEnd));break}if(v){if(h.x==null||v.x<h.x){h.x=v.x}if(p.x==null||v.x>p.x){p.x=v.x}if(h.y==null||v.y<h.y){h.y=v.y}if(p.y==null||v.y>p.y){p.y=v.y}}}r.push(' ">');if(!n){var g=this.lineScale_*this.lineWidth;if(g<1){a*=g}r.push("<g_vml_:stroke",' opacity="',a,'"',' joinstyle="',this.lineJoin,'"',' miterlimit="',this.miterLimit,'"',' endcap="',E(this.lineCap),'"',' weight="',g,'px"',' color="',u,'" />')}else if(typeof this.fillStyle=="object"){var y=this.fillStyle;var b=0;var S={x:0,y:0};var x=0;var T=1;if(y.type_=="gradient"){var N=y.x0_/this.arcScaleX_;var C=y.y0_/this.arcScaleY_;var k=y.x1_/this.arcScaleX_;var L=y.y1_/this.arcScaleY_;var A=this.getCoords_(N,C);var O=this.getCoords_(k,L);var M=O.x-A.x;var _=O.y-A.y;b=Math.atan2(M,_)*180/Math.PI;if(b<0){b+=360}if(b<1e-6){b=0}}else{var A=this.getCoords_(y.x0_,y.y0_);var D=p.x-h.x;var P=p.y-h.y;S={x:(A.x-h.x)/D,y:(A.y-h.y)/P};D/=this.arcScaleX_*o;P/=this.arcScaleY_*o;var H=e.max(D,P);x=2*y.r0_/H;T=2*y.r1_/H-x}var B=y.colors_;B.sort(function(e,t){return e.offset-t.offset});var j=B.length;var F=B[0].color;var I=B[j-1].color;var q=B[0].alpha*this.globalAlpha;var R=B[j-1].alpha*this.globalAlpha;var U=[];for(var d=0;d<j;d++){var z=B[d];U.push(z.offset*T+x+" "+z.color)}r.push('<g_vml_:fill type="',y.type_,'"',' method="none" focus="100%"',' color="',F,'"',' color2="',I,'"',' colors="',U.join(","),'"',' opacity="',R,'"',' g_o_:opacity2="',q,'"',' angle="',b,'"',' focusposition="',S.x,",",S.y,'" />')}else{r.push('<g_vml_:fill color="',u,'" opacity="',a,'" />')}r.push("</g_vml_:shape>");this.element_.insertAdjacentHTML("beforeEnd",r.join(""))};x.fill=function(){this.stroke(true)};x.closePath=function(){this.currentPath_.push({type:"close"})};x.getCoords_=function(e,t){var n=this.m_;return{x:o*(e*n[0][0]+t*n[1][0]+n[2][0])-u,y:o*(e*n[0][1]+t*n[1][1]+n[2][1])-u}};x.save=function(){var e={};b(this,e);this.aStack_.push(e);this.mStack_.push(this.m_);this.m_=y(g(),this.m_)};x.restore=function(){b(this.aStack_.pop(),this);this.m_=this.mStack_.pop()};x.translate=function(e,t){var n=[[1,0,0],[0,1,0],[e,t,1]];C(this,y(n,this.m_),false)};x.rotate=function(e){var t=r(e);var i=n(e);var s=[[t,i,0],[-i,t,0],[0,0,1]];C(this,y(s,this.m_),false)};x.scale=function(e,t){this.arcScaleX_*=e;this.arcScaleY_*=t;var n=[[e,0,0],[0,t,0],[0,0,1]];C(this,y(n,this.m_),true)};x.transform=function(e,t,n,r,i,s){var o=[[e,t,0],[n,r,0],[i,s,1]];C(this,y(o,this.m_),true)};x.setTransform=function(e,t,n,r,i,s){var o=[[e,t,0],[n,r,0],[i,s,1]];C(this,o,true)};x.clip=function(){};x.arcTo=function(){};x.createPattern=function(){return new L};k.prototype.addColorStop=function(e,t){t=w(t);this.colors_.push({offset:e,color:t.color,alpha:t.alpha})};G_vmlCanvasManager=c;CanvasRenderingContext2D=S;CanvasGradient=k;CanvasPattern=L})()}