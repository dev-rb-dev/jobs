<div class="modal fade" id="cvModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content resumes-width">
            <div class="modal-header">
                <h2>{{ __('messages.your_cv') }}</h2>
                <button type="button" aria-label="Close" class="btn btn-sm btn-icon btn-active-color-primary"
                        data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
						<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                             version="1.1">
							<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                               fill="#000000">
								<rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"/>
								<rect fill="#000000" opacity="0.5"
                                      transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                      x="0" y="7" width="16" height="2" rx="1"/>
							</g>
						</svg>
					</span>
                </button>
            </div>
            <div class="modal-body scroll-y scroll-y mx-5 mx-xl-15 my-7 cv-download-content" id="cvTemplate">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary me-3 printCV">{{ __('messages.common.print') }}</button>
                <button class="btn btn-primary me-3"
                        id="downloadPDF">{{ __('messages.common.download').' PDF' }}</button>
                <button type="button" class="btn btn-light btn-active-light-primary me-2"
                        data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
            </div>
        </div>
    </div>
</div>
