
<div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
						<div class="kt-container  kt-container--fluid ">
							<div class="kt-footer__copyright">
								2020&nbsp;&copy;&nbsp;<a class="kt-link">ITPM_WE_60</a>
							</div>
							<div class="kt-footer__menu">
                                

								<a href="" target="_blank" class="kt-footer__menu-link kt-link">All Rights Reserved</a>
							
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>


		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#2c77f4",
						"light": "#ffffff",
						"dark": "#282a3c",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			};
		</script>


		<script src="assets/plugins/global/plugins.bundle.js" type="text/javascript"></script>
		<script src="assets/js/scripts.bundle.js" type="text/javascript"></script>
		<script src="assets/js/pages/dashboard.js" type="text/javascript"></script>
        <script src="assets/js/pages/custom/login/login-general.js" type="text/javascript"></script>
        <script src="assets/plugins/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
        <script src="assets/js/pages/crud/datatables/advanced/footer-callback.js" type="text/javascript"></script>
        <script src="assets/js/pages/dashboard.js" type="text/javascript"></script>
        <script src="assets/js/pages/custom/user/profile.js" type="text/javascript"></script>
        <script src="assets/js/pages/crud/file-upload/dropzonejs.js" type="text/javascript"></script>
        <script src="assets/js/pages/components/extended/sweetalert2.js" type="text/javascript"></script>

        <script>
            let $button = $("#submit_content");
            $button.prop("disabled", true);

            $('#paste_contents').bind("change keyup input",function() {
                $button.prop("disabled", (this.value == "")? true : false);
            });
        </script>

        <script>
        function toggleFullScreen() {
        if ((document.fullScreenElement && document.fullScreenElement !== null) ||
        (!document.mozFullScreen && !document.webkitIsFullScreen)) {
        if (document.documentElement.requestFullScreen) {
        document.documentElement.requestFullScreen();
        } else if (document.documentElement.mozRequestFullScreen) {
        document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullScreen) {
        document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        }
        } else {
        if (document.cancelFullScreen) {
        document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
        document.webkitCancelFullScreen();
        }
        }
        }
        </script>



</body>

</html>
