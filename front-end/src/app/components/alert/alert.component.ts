import { Component, OnInit, Inject } from '@angular/core';
import { MAT_DIALOG_DATA, MatDialogRef } from '@angular/material/dialog';

@Component({
  selector: 'app-alert',
  templateUrl: './alert.component.html',
  styleUrls: ['./alert.component.sass']
})
export class AlertComponent implements OnInit {

  constructor(
    @Inject(MAT_DIALOG_DATA) public data: {
      title: string,
      content: string
    },
    public dialogRef: MatDialogRef<AlertComponent>,
  ) { }

  ngOnInit(): void {
  }
  public close(): void {
    this.dialogRef.close();
  }

}
