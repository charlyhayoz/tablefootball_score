import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { GamesPage } from './games.page';

const routes: Routes = [
  {
    path: '',
    component: GamesPage
  },
  {
    path: 'edit-game',
    loadChildren: () => import('./modals/edit-game/edit-game.module').then( m => m.EditGamePageModule)
  },
  {
    path: 'create-game',
    loadChildren: () => import('./modals/create-game/create-game.module').then( m => m.CreateGamePageModule)
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class GamesPageRoutingModule {}
