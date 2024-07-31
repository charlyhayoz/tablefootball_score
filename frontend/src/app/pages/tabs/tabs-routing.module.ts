import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { TabsPage } from './tabs.page';

const routes: Routes = [
  {
    path: 'tabs',
    component: TabsPage,
    children: [
      {
        path: 'games',
        loadChildren: () =>
          import('../games/games.module').then((m) => m.GamesPageModule),
      },
      {
        path: 'statistics',
        loadChildren: () =>
          import('../statistics/statistics.module').then(
            (m) => m.StatisticsPageModule
          ),
      },
      {
        path: 'players',
        loadChildren: () =>
          import('../players/players.module').then((m) => m.PlayersPageModule),
      },
      {
        path: '',
        redirectTo: '/tabs/games',
        pathMatch: 'full',
      },
    ],
  },
  {
    path: '',
    redirectTo: '/tabs/games',
    pathMatch: 'full',
  },
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
})
export class TabsPageRoutingModule {}
