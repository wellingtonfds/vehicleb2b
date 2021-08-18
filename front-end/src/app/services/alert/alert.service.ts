import { Injectable } from '@angular/core';
import { MatDialog, MatDialogRef } from '@angular/material/dialog';
import { AlertComponent } from '../../components/alert/alert.component';

@Injectable({
  providedIn: 'root'
})
export class AlertService {

  constructor(
    public dialog: MatDialog
  ) { }

  public show(title: string, content: string, width: string = '500px'): MatDialogRef<AlertComponent> {
    return this.dialog.open(AlertComponent, {
      width,
      data: {
        title,
        content
      }
    });
  }
}
