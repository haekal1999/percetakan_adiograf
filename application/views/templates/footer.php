   <!-- Footer -->

   <!-- End of Footer -->
   <!-- Bootstrap core JavaScript-->
   <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
   <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   <!-- Core plugin JavaScript-->
   <script type="text/javascript" src="<?php echo base_url() . 'assets/vendor/dropify/dist/js/dropify.min.js' ?>"></script>

   <!-- Custom scripts for all pages-->
   <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

   <!-- Page level plugins -->
   <script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

   <!-- Page level custom scripts -->
   <script src="<?php echo base_url() ?>assets/js/demo/chart-area-demo.js"></script>
   <script src="<?php echo base_url() ?>assets/js/demo/chart-pie-demo.js"></script>

   <!-- Dropify-->
   <script src="<?php echo base_url() ?>assets/vendor/dropify/dist/js/dropify.min.js"></script>



   <!-- Start of LiveChat (www.livechatinc.com) code -->
   <script>
       window.__lc = window.__lc || {};
       window.__lc.license = 12903723;;
       (function(n, t, c) {
           function i(n) {
               return e._h ? e._h.apply(null, n) : e._q.push(n)
           }
           var e = {
               _q: [],
               _h: null,
               _v: "2.0",
               on: function() {
                   i(["on", c.call(arguments)])
               },
               once: function() {
                   i(["once", c.call(arguments)])
               },
               off: function() {
                   i(["off", c.call(arguments)])
               },
               get: function() {
                   if (!e._h) throw new Error("[LiveChatWidget] You can't use getters before load.");
                   return i(["get", c.call(arguments)])
               },
               call: function() {
                   i(["call", c.call(arguments)])
               },
               init: function() {
                   var n = t.createElement("script");
                   n.async = !0, n.type = "text/javascript", n.src = "https://cdn.livechatinc.com/tracking.js", t.head.appendChild(n)
               }
           };
           !n.__lc.asyncInit && e.init(), n.LiveChatWidget = n.LiveChatWidget || e
       }(window, document, [].slice))
   </script>
   <noscript><a href="https://www.livechatinc.com/chat-with/12903723/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechatinc.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
   <!-- End of LiveChat code -->

   </body>





   </html>