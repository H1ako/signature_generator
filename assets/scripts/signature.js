class Signature {
  constructor(canvas, text, curves, textX, textY, width, height, fontSize, fontName = 'Arial', font = 'Arial', thickness = 10, angle = 0, color = 'black') {
    this.text = text;
    this.curves = curves;
    this.textX = textX;
    this.textY = textY;
    this.width = width;
    this.height = height;
    this.thickness = thickness;
    this.fontSize = fontSize;
    this.fontName = fontName;
    this.font = font;
    this.color = color;
    this.angle = angle;

    this.canvas = canvas;
    this.context = canvas.getContext('2d');

    this.canvas.width = width;
    this.canvas.height = height;
  }

  draw() {
    this.drawCurves();
    this.drawText();
  }

  drawText() {
    this.context.font = `${this.fontSize}px ${this.fontName}`;
    this.context.fillStyle = this.color;
    this.context.fillText(this.text, this.textX, this.textY);
  }

  drawCurves() {
    paper.setup(this.canvas);
    paper.view.viewSize = new paper.Size(this.width, this.height);
    for (let l = 0; l < this.curves.length; l++) {
      const curve = this.curves[l];
      // Create a new path
      var path = new paper.Path();
      path.strokeColor = 'black';
      path.strokeWidth = this.thickness;
      path.strokeCap = 'round';

      path.moveTo(curve[0]);
      // Iterate through the points array and create curve segments
      // for (var i = 1; i < curve.length - 1; i++) {
      //   var previousPoint = curve[i - 1];
      //   var currentPoint = curve[i];
      //   var nextPoint = curve[i + 1];

      //   // Calculate the control points based on neighboring points
      //   var handle1 = currentPoint.subtract(previousPoint).multiply(0.25);
      //   var handle2 = nextPoint.subtract(currentPoint).multiply(0.25);

      //   // Create the curve segment
      //   var curve1 = new paper.Curve(currentPoint, handle1, handle2, nextPoint);

      //   // Add the curve segment to the path
      //   path.curveTo(curve1);
      // }

      // Move to the first point

      // Draw the Bezier curve
      for (let j = 0; j < curve.length; j = j + 4) {
        const startPoint = curve[j];
        const controlPoint1 = curve[j + 1] ? curve[j + 1] : startPoint;
        const controlPoint2 = curve?.[j + 2] ? curve?.[j + 2] : controlPoint1;
        const endPoint = curve?.[j + 3] ? curve?.[j + 3] : controlPoint2;
        path.cubicCurveTo(startPoint, controlPoint1, controlPoint2, endPoint);
      }

      // for (let j = 0; j < curve.length; j += 1) {
      // path.add(curve[j]);
      // const startPoint = curve[j];
      // const controlPoint = curve[j + 1] ? curve[j + 1] : startPoint;
      // const endPoint = curve?.[j + 2] ? curve?.[j + 2] : controlPoint;
      // path.cubicCurveTo(startPoint, controlPoint, endPoint);
      // }

      // for (var j = 0; j < curve.length; j += 3) {
      // var control1 = curve?.[j + 1] ? curve[j + 1] : curve[j];
      // var anchor1 = curve?.[j + 2] ? curve[j + 2] : control1;
      // var anchor2 = curve?.[j + 3] ? curve?.[j + 3] : anchor1;
      // var control2 = anchor1.subtract(control1).add(anchor1);
      // path.cubicCurveTo(control1, control2, anchor2);
      // }
      // path.smooth();

      // Update the view
      paper.view.draw();

      // this.context.strokeStyle = this.color;
      // this.context.lineWidth = this.thickness;
      // this.context.lineCap = 'round'

    }
  }
}