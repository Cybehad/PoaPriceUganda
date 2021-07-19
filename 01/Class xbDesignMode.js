function xbDesignMode(aIFrame){

    this.mEditorDocument = null;
    this.mIFrameElement = null;

    // argument is a string, therefore an ID
    if ( (typeof(aIFrame) == "string") && (document.getElementById(aIFrame).tagName.toLowerCase()==="iframe") ){
        this.mIFrameElement = document.getElementById(aIFrame);
    } else if( (typeof(aIFrame)=="object") && (aIFrame.tagName.toLowerCase() === "iframe") ){
        this.mIFrameElement = aIFrame;
    } else {
        throw "Argument isn't an id of an iframe or an iframe reference";
    }

    if (this.mIFrameElement.contentDocument){
        // Gecko
        this.mEditorDocument = this.mIFrameElement.contentDocument;
        this.mEditorDocument.designMode = "On";
    } else {
        // IE
        this.mEditorDocument = this.mIFrameElement.contentWindow.document;
        this.mEditorDocument.designMode = "On";
        // IE needs to reget the document element after designMode was set
        this.mEditorDocument = this.mIFrameElement.contentWindow.document;
    }
}

xbDesignMode.prototype.execCommand = function (aCommandName, aParam){
    if (this.mEditorDocument)
        this.mEditorDocument.execCommand(aCommandName, false, aParam);
    else
        throw "no mEditorDocument found";
}

xbDesignMode.prototype.setCSSCreation = function (aStyleWithCSS){
    if (this.mEditorDocument)
        this.mEditorDocument.execCommand("styleWithCSS", false, aStyleWithCSS);
    else
        throw "no mEditorDocument found";

}