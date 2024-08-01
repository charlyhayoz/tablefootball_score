import { Component } from '@angular/core';
import { ApiService } from './services/api.service';
import { Services } from './services/services.service';
import { UtilsService } from './services/utils.service';

@Component({
  selector: 'app-root',
  templateUrl: 'app.component.html',
  styleUrls: ['app.component.scss'],
})
export class AppComponent {
  constructor(
    private apiService: ApiService,
    private services: Services,
    private utilsService: UtilsService
  ) {
    services.apiService = apiService;
    services.utilsService = utilsService;
  }
}
