import { Game } from './game';
import { Gameplayer } from './gameplayer';

export interface Player {
  id: number;
  pseudo: string;
  avatar: string;
  created_at: string;
  games?: Game[];
  gameplayers?: Gameplayer[];
  pivot?: Gameplayer;
}
