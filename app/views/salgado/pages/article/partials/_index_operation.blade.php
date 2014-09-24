<div class="btn-group">
	<button
		type="button"
		class="btn btn-xs btn-danger"
		delete-url="{{ URL::route('admin.article.delete',[ $article->id ])  }}"
		onclick="Common.setDeleteURL(this,'#delete_form')"
		data-toggle="modal"
		data-target="#removeModal"
	>
	    <span class="glyphicon glyphicon-remove"></span>
	</button>

    <a href="#myModal" class="btn btn-xs btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span></a>
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">ویرایش</h3>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">تیتر اصلی بالا</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="تیتر اصلی بالا" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">تیتر اصلی </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="تیتر اصلی" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">تیتر اصلی پایین</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder=" تیتر اصلی پایین" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> خلاصه خبر </label>
                            <div class="col-sm-10">
                                <textarea class="form-control"  placeholder="خلاصه خبر "rows="4"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">body</label>
                            <div class="col-sm-10">
                                <textarea class="form-control"  placeholder="body"rows="4"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">تاریخ انتشار</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="تاریخ انتشار مقاله" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">مولف</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="نویسنده یا مولف" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-primary btn-sm">به روز رسانی</a>
                    <a href="#" class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true">بستن</a>
                </div>
            </div>
        </div>
    </div>

</div>