<!-- banner update Modal -->
<div class="modal fade" id="editBanners" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Update Banner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" id="updateBanner1923" enctype="multipart/form-data" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="up-banner-getId">
                    <div class="row">
                        <div class="col mb-3 text-center">
                            <label for="up-banner-image">
                                <img width="100px" style="border: 1px solid #ddd; padding:10px" id="banner_imgModalSrc">
                            </label>
                            <input type="file" id="up-banner-image" class="form-control d-none" placeholder="Banner Title" />
                            <span class="d-block">Click to change image</span>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="up-banner-title" class="form-label">Title</label>
                            <input type="text" id="up-banner-title" class="form-control" placeholder="Banner Title" />
                        </div>
                        <div class="col mb-0">
                            <label for="up-banner-subTitle" class="form-label">Sub Title</label>
                            <input type="text" id="up-banner-subTitle" class="form-control" placeholder="Sub Title" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="dlt-Banner" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" id="deleteBanner1923" enctype="multipart/form-data" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="delete-banner-getId">
                    <h3>Are you want to sure you can delete this banner?</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        No
                    </button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>