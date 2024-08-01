import { Component, OnInit } from '@angular/core';
import { Services } from 'src/app/services/services.service';

@Component({
  selector: 'app-statistics',
  templateUrl: './statistics.page.html',
  styleUrls: ['./statistics.page.scss'],
})
export class StatisticsPage implements OnInit {
  public sorting: string = 'wins';
  constructor(public services: Services) {}

  ngOnInit() {}

  ionViewDidEnter() {
    this.getStatistics();
  }

  statistics_data: any = null;
  getStatistics() {
    this.services.apiService
      .get<any>('statistics')
      .subscribe((statistics: any) => {
        this.statistics_data = statistics;
        this.sort(this.sorting);
      });
  }

  sortChange(event: any) {
    this.sort(event.detail.value);
  }

  sort(sorting: string) {
    this.sorting = sorting;

    switch (sorting) {
      case 'wins':
        this.statistics_data.sort((a: any, b: any) =>
          a.games_winned > b.games_winned ? 1 : -1
        );
        break;
      case 'loss':
        this.statistics_data.sort((a: any, b: any) =>
          a.games_losed > b.games_losed ? 1 : -1
        );
        break;
      case 'ratio':
        this.statistics_data.sort((a: any, b: any) =>
          a.games_ratio > b.games_ratio ? 1 : -1
        );
        break;
      case 'difference':
        this.statistics_data.sort((a: any, b: any) =>
          a.goals_difference > b.goals_difference ? 1 : -1
        );
        break;
    }
    this.statistics_data.reverse();
  }
}
